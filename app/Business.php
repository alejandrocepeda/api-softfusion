<?php

namespace App;

use App\Http\Resources\BusinessCollection;
use App\Http\Resources\BusinessResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * Class business.
 *
 * @property mixed contact
 * @property mixed contacts
 */
class Business extends Model
{
    use SoftDeletes, TransformDates, Searchable;

    public $relationships = ['yearsInBusiness',
                             'industries',
                             'annualRevenues',
                             'address.zipcode.city.state',
                             'creditScores', ];

    protected $dates              = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden             = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable           = ['name',
                                     'federal_tax_id',
                                     'address_id',
                                     'years_in_business_id',
                                     'annual_revenue_id',
                                     'credit_score_id',
                                     'industry_id',
                                     'how_do_you_hear_id',
                                     'phone',
                                     'phone_ext',
                                     'web',
                                     'status',
    ];
    public $resource           = BusinessResource::class;
    public $resourceCollection = BusinessCollection::class;
	public $class              = Business::class;

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
		
		if($this->business){
			$array['business_name'] = $this->business['name'];
			
		}
		if($this->yearsInBusiness){
			$array['time_name'] = $this->yearsInBusiness['name'];
			
		}
		
		if($this->annualRevenues){
			$array['annual_revenues'] = $this->annualRevenues['name'];
			
		}
		
		if($this->industries){
			$array['industrie_name'] = $this->industries['name'];
			
		}
		
		if(isset($this->address->zipcode->city->state)){
			$array['state_name'] = $this->address->zipcode->city->state['name'];
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function borrower()
    {
        return $this->hasMany(Contact::class)->where();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annualRevenues()
    {
        return $this->belongsTo(AnnualRevenue::class, 'annual_revenue_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function yearsInBusiness()
    {
        return $this->belongsTo(YearsInBusiness::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creditScores()
    {
        return $this->belongsTo(CreditScore::class, 'credit_score_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function howDoYouHears()
    {
        return $this->belongsTo(HowDoYouHear::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function industries()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'activitytable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imagentable')
                    ->withDefault(['url' => 'https://www.freelogodesign.org/Content/img/logo-ex-7.png']);
    }
}
