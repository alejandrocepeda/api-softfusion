<?php

namespace App;

use App\Http\Resources\StateCollection;
use App\Http\Resources\StateResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property mixed          $country
 * @property mixed          $cities
 * @property mixed          $lenders
 * @property int            $country_id
 * @property string         $name
 */
class State extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable           = ['country_id', 'name'];
    protected $hidden             = ['created_at', 'updated_at', 'deleted_at', 'pivot'];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at'];
    public $relationships         = ['cities'];
    public $resource              = StateResource::class;
    public $resourceCollection    = StateCollection::class;

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
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lenders()
    {
        return $this->belongsToMany(Lender::class);
    }
}
