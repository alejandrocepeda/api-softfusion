<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['url', 'activity_id'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    /*
     |--------------------------------------------------------------------------
     | Relations database
     |--------------------------------------------------------------------------
     |
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
