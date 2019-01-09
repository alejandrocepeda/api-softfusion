<?php

namespace App;

use App\Http\Resources\AnnualRevenueCollection;
use App\Http\Resources\AnnualRevenueResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AnnualRevenue.
 *
 * @property int                 $id
 * @property string              $name
 * @property int                 $value
 * @property int                 $status
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\AnnualRevenue onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnnualRevenue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnnualRevenue whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnnualRevenue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnnualRevenue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnnualRevenue whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnnualRevenue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnnualRevenue whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AnnualRevenue withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\AnnualRevenue withoutTrashed()
 * @mixin \Eloquent
 *
 * @property \Illuminate\Database\Eloquent\Collection|\App\Business[] $businesses
 */
class AnnualRevenue extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable        = ['name', 'value', 'status'];
    protected $hidden          = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates           = ['created_at', 'updated_at', 'deleted_at'];
    protected $table           = 'annual_revenues';
    public $resource           = AnnualRevenueResource::class;
    public $resourceCollection = AnnualRevenueCollection::class;

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
    public function lenders()
    {
        return $this->hasMany(Lender::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
