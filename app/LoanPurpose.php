<?php

namespace App;

use App\Http\Resources\LoanPurposeCollection;
use App\Http\Resources\LoanPurposeResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LoanPurpose.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property string         $name
 * @property string         $lang
 * @property int            $status
 * @property mixed          applications
 */
class LoanPurpose extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable        = ['name', 'status'];
    protected $hidden          = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates           = ['created_at', 'updated_at', 'deleted_at'];
    public $resource           = LoanPurposeResource::class;
    public $resourceCollection = LoanPurposeCollection::class;

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
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
