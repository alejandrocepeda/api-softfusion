<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HowDoYouHear.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property string         $name
 * @property string         $lang
 * @property int            $status
 */
class HowDoYouHear extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['name', 'status'];
    protected $hidden   = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
