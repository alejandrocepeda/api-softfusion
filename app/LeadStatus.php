<?php

namespace App;

use App\Http\Resources\LeadStatusCollection;
use App\Http\Resources\LeadStatusResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LeadStatus.
 */
class LeadStatus extends Model
{
    use SoftDeletes, TransformDates;

    protected $dates           = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden          = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable        = ['name', 'status', 'step', 'level'];
    public $resource           = LeadStatusResource::class;
    public $resourceCollection = LeadStatusCollection::class;

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
    | Relations Database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
