<?php

namespace App;

use App\Http\Resources\ApplicationStatusCollection;
use App\Http\Resources\ApplicationStatusResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationStatus extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['status', 'name', 'step', 'level'];
    protected $hidden   = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    public $resource           = ApplicationStatusResource::class;
    public $resourceCollection = ApplicationStatusCollection::class;

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
