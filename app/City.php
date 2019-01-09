<?php

namespace App;

use App\Http\Resources\CityCollection;
use App\Http\Resources\CityResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\City.
 *
 * @property mixed          $zipcode
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property mixed          $attributes
 * @property mixed          $state
 * @property string         $name
 * @property int            $state_id
 */
class City extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable           = ['state_id', 'name'];
    protected $hidden             = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at'];
    public $relationships         = ['zipcode'];
    public $resource              = CityResource::class;
    public $resourceCollection    = CityCollection::class;

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

    /*
     |--------------------------------------------------------------------------
     | Relations database
     |--------------------------------------------------------------------------
     |
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zipcode()
    {
        return $this->hasMany(Zipcode::class);
    }
}
