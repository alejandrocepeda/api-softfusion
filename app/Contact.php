<?php

namespace App;

use App\Http\Resources\ContactCollection;
use App\Http\Resources\ContactResource;
use App\Traits\TransformDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * @property mixed lead
 * @property mixed leads
 */
class Contact extends Model
{
	use SoftDeletes, TransformDates, Searchable;
	
	protected $dates = ['deleted_at', 'created_at', 'updated_at', 'birthdate'];
	
	protected $casts = ['birthdate' => 'date:Y-m-d'];
	
	protected $hidden        = ['deleted_at', 'created_at', 'updated_at'];
	protected $fillable      = ['name',
								'email',
								'address_id',
								'business_id',
								'phone',
								'phone_ext',
								'social_security',
								'birthdate',
								'ownership',
								'status',];
	public    $relationships = ['address.zipcode.city.state',
								'business.address.zipcode.city.state',
								'leads',
								'image',
								'user',];
	
	public    $resource           = ContactResource::class;
	public    $resourceCollection = ContactCollection::class;
	public    $class              = Contact::class;
	protected $table              = 'contacts';
	
	public function resourceCollection()
	{
		return 'hola';
	}
	
	public function toSearchableArray()
	{
		$array = $this->toArray();
		
		if($this->business){
			$array['business_name'] = $this->business['name'];
			
		}
		
		if(isset($this->business->address->zipcode->city->state)){
			$array['state_name'] = $this->business->address->zipcode->city->state['name'];
		}
		
		return $array;
	}
	
	public function setBirthdateAttribute($value)
	{
		$this->attributes['birthdate'] = new Carbon($value);
	}
	
	/**
	 * @param $value
	 * @return string
	 */
	public function setNameAttribute($value)
	{
		return $this->attributes['name'] = strtolower($value);
	}
	
	/**
	 * @param $value
	 * @return string
	 */
	public function getNameAttribute($value)
	{
		return ucwords($value);
	}
	
	/*
	|--------------------------------------------------------------------------
	| Relations Database
	|--------------------------------------------------------------------------
	|
	*/
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function activities()
	{
		return $this->morphMany(Activity::class, 'activitytable');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function address()
	{
		return $this->belongsTo(Address::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function business()
	{
		return $this->belongsTo(Business::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function leads()
	{
		return $this->hasOne(Lead::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function lenders()
	{
		return $this->hasMany(Lender::class);
	}
	
	public function coborrower_applications()
	{
		return $this->hasMany(Application::class, 'coborrower_id', 'id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function user()
	{
		return $this->hasOne(User::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function signatures()
	{
		return $this->hasMany(Signature::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function image()
	{
		return $this->morphOne(Image::class, 'imagentable')->withDefault(['url' => 'http://i.pravatar.cc/150']);
	}
}
