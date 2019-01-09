<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ParametersForm.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property mixed          $category
 * @property string         $name
 * @property string         $lang
 * @property int            $parameters_form_category_id
 * @property int            $status
 */
class ParametersForm extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['name', 'status', 'parameters_form_category_id'];
    protected $hidden   = ['created_at', 'updated_at', 'deleted_at', 'pivot'];
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ParametersFormCategory::class, 'parameters_form_category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lenders()
    {
        return $this->belongsToMany(Lender::class, 'lender_paramenters_form');
    }
}
