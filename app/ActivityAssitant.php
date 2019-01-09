<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityAssitant extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['activity_id', 'contact_id'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    /*
   |--------------------------------------------------------------------------
   | Relations Database
   |--------------------------------------------------------------------------
   |
   */

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function contact()
    {
        return $this->belongsTo(User::class, 'contact_id');
    }
}
