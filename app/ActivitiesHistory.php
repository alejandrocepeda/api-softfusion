<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivitiesHistory extends Model
{
    use SoftDeletes, TransformDates;

    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden   = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['name',
                           'activity_id',
                           'activity_status_id', ];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activitiesStatus()
    {
        return $this->belongsTo(ActivitiesStatus::class, 'activity_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
