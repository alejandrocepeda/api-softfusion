<?php

namespace App;

use App\Http\Resources\ApplicationCollection;
use App\Http\Resources\ApplicationResource;
use App\Http\Resources\DocumentCollection;
use App\Traits\TransformDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Application.
 *
 * @property \Carbon\Carbon         $created_at
 * @property int                    $id
 * @property \Carbon\Carbon         $updated_at
 * @property \Carbon\Carbon         $deleted_at
 * @property mixed                  $year_in_business
 * @property mixed                  $annual_revenue
 * @property int                    $lead_id
 * @property int                    $loan_amount
 * @property int                    $product_id
 * @property int|null               $loan_purpose_id
 * @property int                    $business_info_id
 * @property int                    $application_status_id
 * @property int                    $processor_id
 * @property int                    $bankruptcy
 * @property int                    $collateral
 * @property int|null               $exist_debt
 * @property int                    $status
 * @property \App\User              $broker
 * @property \App\Loan_purpose|null $loan_purpose
 * @property \App\Product           $product
 */
class Application extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable           = ['lead_id',
                                     'loan_amount',
                                     'product_id',
                                     'loan_purpose_id',
                                     'business_id',
                                     'application_status_id',
                                     'processor_id',

                                     'bankruptcy',
                                     'collateral',
                                     'coborrower_id',
                                     'exist_debt',
                                     'status', ];
    public $relationships      = ['business.address.zipcode.city.state',
                                     'application_status',
                                     'processor',
                                     'lead.contact.leads',
                                     'lead.contact.user',
                                     'lead.executive',
                                     'product', ];
    public $resource              = ApplicationResource::class;
    public $resourceCollection    = ApplicationCollection::class;
    protected $hidden             = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Support\Collection
     */
    private function loan_required_documents()
    {
        $general_documents = collect();
    
       

        foreach ($this->product->documents() as $item) {
            $quantity = $item['quantity'] ?: 0;
            $date     = Carbon::now();

            while ($quantity > 0) {
                switch ($item['periodicity']['value']) {
                    case 0:
                        $period = null;
                        break;
                    case 30:
                        $date   = $date->startOfMonth()->subMonth();
                        $period = $date->format('F').' - '.$date->format('Y');
                        break;
                    case 91:
                        $date   = $date->startOfQuarter()->subQuarter();
                        $period = 'Q'.$date->quarter;
                        break;
                    case 365:
                        $date   = $date->startOfYear();
                        $period = $date->format('Y');
                        break;
                    default:
                        $date   = $date->subDays($item['periodicity']['value']);
                        $period = $date->format('F');
                }

                $data = ['document_type_id' => $item['type']['id'],
                         'type'             => $item['type']['name'],
                         'period'           => isset($period) ? $period : null,
                         'required'         => $item['required'],
                         'multiple'         => $item['multiple'],
                         'order'            => $item['order'],
                         'status'           => $item['status'], ];

                $general_documents->push($data);

                --$quantity;
            }
        }

        return $general_documents;
    }

    /**
     * @return mixed
     */
    public function documents_organized()
    {
        $general_documents = $this->loan_required_documents();

        $documents = collect($this->documents);
        

        $result = collect();

        array_map(function ($item) use ($documents, $result) {
            $document = $documents->where('document_type_id', '=', $item['document_type_id'])
                                  ->where('period', '=', $item['period']);

            if ($item['multiple'] && $document->count() > 0) {
                foreach ($document->toArray() as $one) {
                    $result->push($one);
                }
            } elseif ($document->count() > 0) {
                
                
                $item = array_merge($item, $document->first()->toarray());
            }

            $result->push($item);

            return $item;
        }, $general_documents->toArray());

        return collect($result)->groupBy('document_type_id')->map(function ($events) {
            $events = collect($events);

            return ['type'             => $events->last()['type'],
                    'document_type_id' => $events->last()['document_type_id'],
                    'order'            => $events->last()['order'],
                    'required'         => $events->last()['required'],
                    'multiple'         => $events->last()['multiple'],
                    'documents'        => $events, ];
        })->sortBy('order')->values();
    }

    public function matchs()
    {
        //verificar todos los lender
        //filtrar las condiciones del prodcuto con los de lender

        /*return Lender::with('industries')->whereHas('industries',function ($query) {
            $query->where('id', $this->business->industry_id);
        })->get();*/

        if (!$this->business->industry_id) {
            return [];
        }

        $result = Product::find($this->product_id)->lenders();

        if ($this->business->industry_id) {
            $result->whereHas('industries', function ($query) {
                $query->where('id', $this->business->industry_id);
            });
        }

        if ($this->business->creditScores->value) {
            $result->whereHas('credit_score', function ($query) {
                $query->where('value', '<=', $this->business->creditScores->value);
            });
        }

        if ($this->business->yearsInBusiness->value) {
            $result->whereHas('years_in_business', function ($query) {
                $query->where('value', '<=', $this->business->yearsInBusiness->value);
            });
        }

        if ($this->business->annualRevenues->value) {
            $result->whereHas('revenues', function ($query) {
                $query->where('value', '<=', $this->business->annualRevenues->value);
            });
        }

        $result->where(function ($query) {
            $query->where('max_loan_size', '>', $this->loan_amount ?: 0)->orWhereNull('max_loan_size');
        });

        $result->where(function ($query) {
            $query->where('min_loan_size', '<', $this->loan_amount ?: 0)->orWhereNull('min_loan_size');
        });

        $result->get();

        return $result;
    }

    /*
   |--------------------------------------------------------------------------
   | Relations database
   |--------------------------------------------------------------------------
   |
   */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'activitytable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activitiesHistories()
    {
        return $this->hasMany(ActivitiesHistory::class, 'activity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application_status()
    {
        return $this->belongsTo(ApplicationStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

    public function clientAdvanceds()
    {
        return $this->hasMany(ClientAdvanced::class);
    }

    public function funded()
    {
        return $this->approvals()->where('funded', '=', true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coborrower()
    {
        return $this->belongsTo(Contact::class, 'coborrower_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasOffers()
    {
        return $this->hasMany(HasOffers::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan_purpose()
    {
        return $this->belongsTo(LoanPurpose::class);
    }

    /**
     * Role proccesor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function processor()
    {
        return $this->belongsTo(User::class, 'processor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function read()
    {
        return $this->morphMany(ReadItem::class, 'readtable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signatures()
    {
        return $this->hasMany(Signature::class);
    }

    public function underwritings()
    {
        return $this->hasMany(Underwriting::class);
    }
}
