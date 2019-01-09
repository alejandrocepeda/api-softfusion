<?php

namespace App;

use App\Http\Resources\CreditScoreCollection;
use App\Http\Resources\CreditScoreResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CreditScore.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property string         $name
 * @property int            $value
 * @property int            $status
 */
class CreditScore extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable           = ['name', 'value', 'status'];
    protected $hidden             = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at'];
    public $resource              = CreditScoreResource::class;
    public $resourceCollection    = CreditScoreCollection::class;

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
        return $this->hasMany(Lender::class, 'min_credit_score_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
