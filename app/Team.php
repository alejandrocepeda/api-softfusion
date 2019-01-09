<?php

namespace App;

use App\Http\Resources\TeamResource;
use App\Http\Resources\TeamCollection;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Team extends Model
{
    use SoftDeletes, TransformDates;

	protected   $fillable               = ['name', 'user_id'];
	protected   $dates                  = ['created_at', 'updated_at', 'deleted_at'];
    public      $relationships          = ['image',];
	public      $resource               = TeamResource::class;
	public      $resourceCollection     = TeamCollection::class;
    public      $class                  = Team::class;
    protected   $table                  = 'teams';

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
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function users()
    {
        
        return $this->belongsToMany(User::class,'user_team')
            ->select(array('users.id','users.name','users.email','images.url AS photo'))
            ->join('images', 'images.imagentable_id', '=', 'users.id'); 
    }

    public function images()
    {
        return $this->morphTo();
    }

	public function user()
	{

		return $this->belongsTo(User::class);
	}

	public function activities(){

	     return $this->morphMany(Activity::class, 'activitytable');

    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	 public function brokerInfo()
	 {
		 return $this->morphMany(BrokerInfo::class, 'brokertable');
	 }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imagentable')->withDefault(['url' => 'http://i.pravatar.cc/150']);
    }
}
