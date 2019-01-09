<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicVar extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['name', 'column', 'table', 'status'];
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
    public function commisionRules()
    {
        return $this->hasMany(CommisionRule::class, 'dynamic_var_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function emailTemplate()
    {
        return $this->belongsToMany(EmailsTemplate::class, 'email_template_dynamic_var');
    }
}
