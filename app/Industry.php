<?php

namespace App;

use App\Http\Resources\IndustryCollection;
use App\Http\Resources\IndustryResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Industry.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed          $lenders
 * @property string         $name
 * @property string|null    $description
 * @property int            $status
 * @property string|null    $name_es
 * @property string|null    $deleted_at
 */
class Industry extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable           = ['name', 'description', 'status'];
    protected $hidden             = ['created_at', 'updated_at', 'deleted_at', 'pivot'];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at', 'pivot'];
    public $resource              = IndustryResource::class;
    public $resourceCollection    = IndustryCollection::class;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lenders()
    {
        return $this->belongsToMany(Lender::class, 'lender_industry');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
