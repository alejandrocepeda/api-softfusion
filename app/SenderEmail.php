<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SenderEmail extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['name', 'email', 'status'];
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
    | Relations Database
    |-------------------------------------------------------------------------
    |
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->morphMany(Email::class, 'sendertable');
    }
}
