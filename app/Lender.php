<?php

namespace App;

use App\Http\Resources\LenderCollection;
use App\Http\Resources\LenderResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Lender extends Model
{
    use SoftDeletes, TransformDates,Searchable;

    public $resource                  = LenderResource::class;
    public $resourceCollection        = LenderCollection::class;
    public static $relationships      = ['products',
                                         'credit_score',
                                         'revenues',
                                         'years_in_business',
                                         'property_types',
                                         'states',
                                         'industries',
                                         'contact.business', ];
    protected $fillable           = ['name',
                                         'email',
                                         'contact_id',
                                         'min_loan_size',
                                         'max_loan_size',
                                         'min_terms',
                                         'max_terms',
                                         'min_interest',
                                         'max_interest',
                                         'max_loan_position',
                                         'max_ltv',
                                         'min_credit_score_id',
                                         'years_in_business_id',
                                         'annual_revenue_id',
                                         'negative_days',
                                         'consolidation_refinance',
                                         'weekly_payments',
                                         'puerto_rico',
                                         'favorite',
                                         'status', ];
    protected $hidden             = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at'];
	public $class              = Lender::class;

    /**
     * Si tiene imagen se optimiza y se guarda.
     *
     * @param $request
     *
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public static function fillImage($request, $lender)
    {
        if ($request->hasfile('image')) {
            //Verificamos si el lender ya tiene imagen si es true la borramos
            if ($lender->image) {
                Storage::disk('public')->delete($lender->image->url);
                Image::destroy($lender->image->id);
            }

            $image = Image::storageImage($request->file('image'), 'lenders');
            $lender->image()->save($image);
            $lender->refresh();
        }
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
	
	public function toSearchableArray()
	{
		$array = $this->toArray();
		
		if($this->contact){
			$array['contact_name'] = $this->contact['name'];
			$array['contact_phone'] = $this->contact['phone'];
			
		}
		
		
		
		
		return $array;
	}

    /*
   |--------------------------------------------------------------------------
   | Relations database
   |--------------------------------------------------------------------------
   |
   */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'lender_industry');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function property_types()
    {
        return $this->belongsToMany(ParametersForm::class, 'lender_parameters_form');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function credit_score()
    {
        return $this->belongsTo(CreditScore::class, 'min_credit_score_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function years_in_business()
    {
        return $this->belongsTo(YearsInBusiness::class, 'years_in_business_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function revenues()
    {
        return $this->belongsTo(AnnualRevenue::class, 'annual_revenue_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'lender_product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function states()
    {
        return $this->belongsToMany(State::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'activitytable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imagentable')->withDefault(['url' => 'http://i.pravatar.cc/150']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
