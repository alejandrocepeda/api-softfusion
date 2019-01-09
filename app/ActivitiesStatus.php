<?php

namespace App;

use App\Http\Resources\ActivityStatusCollection;
use App\Http\Resources\ActivityStatusResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivitiesStatus extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable           = ['name'];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at'];
    protected $hidden             = ['created_at', 'updated_at', 'deleted_at'];
    public $resource              = ActivityStatusResource::class;
    public $resourceCollection    = ActivityStatusCollection::class;

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
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany(Activity::class, 'activity_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activitiesHistories()
    {
        return $this->hasMany(ActivitiesHistory::class, 'activity_status_id');
    }
}
