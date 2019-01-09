<?php

namespace App;

use App\Http\Resources\YearsInBusinessCollection;
use App\Http\Resources\YearsInBusinessResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class YearsInBusiness.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property string         $name
 * @property int            $order
 * @property int            $value
 * @property int            $status
 */
class YearsInBusiness extends Model
{
    use SoftDeletes, TransformDates;

    protected $table           = 'years_in_business';
    protected $fillable        = ['name', 'order', 'value', 'status'];
    protected $hidden          = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates           = ['created_at', 'updated_at', 'deleted_at'];
    public $resource           = YearsInBusinessResource::class;
    public $resourceCollection = YearsInBusinessCollection::class;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lenders()
    {
        return $this->hasMany(Lender::class);
    }
}
