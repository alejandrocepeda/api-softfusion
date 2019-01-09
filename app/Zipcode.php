<?php

namespace App;

use App\Http\Resources\ZipcodeCollection;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Zipcode.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property mixed          $city
 * @property int            $city_id
 * @property string|null    $longitude
 * @property string|null    $latitude
 * @property string         $county
 */
class Zipcode extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable           = ['id', 'city_id', 'latitude', 'longitude', 'county'];
    protected $hidden             = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at'];
    public $resource              = \App\Http\Resources\Zipcode::class;
    public $resourceCollection    = ZipcodeCollection::class;

    /*
     |--------------------------------------------------------------------------
     | Relations database
     |--------------------------------------------------------------------------
     |
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
