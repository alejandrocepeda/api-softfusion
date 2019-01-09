<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReadItem extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable  = ['read', 'user_id', 'readtable_id', 'readtable_type'];
    protected $dates     = ['created_at', 'updated_at', 'deleted_at'];
    protected $hidden    = ['created_at', 'updated_at', 'deleted_at', 'readtable_id', 'readtable_type'];

    /*
     |--------------------------------------------------------------------------
     | Relations database
     |--------------------------------------------------------------------------
     |
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function readtable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function leads()
    {
        return $this->morphTo(Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function applications()
    {
        return $this->morphTo(Application::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function users()
    {
        return $this->morphTo(User::class);
    }
}
