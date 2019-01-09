<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailsTemplate extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['status', 'body', 'title', 'subject'];
    protected $hidden   = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    /*
    |--------------------------------------------------------------------------
    | Relations database
    |------------------------------------------------------------------------
    |
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emailTemplateDynamicVars()
    {
        return $this->hasMany();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany(Email::class, 'email_template_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dynamicVar()
    {
        return $this->belongsToMany(DynamicVar::class, 'email_template_dynamic_var');
    }
}
