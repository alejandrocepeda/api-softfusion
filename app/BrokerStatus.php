<?php

namespace App;

use App\Http\Resources\BrokerStatusCollection;
use App\Http\Resources\BrokerStatusResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrokerStatus extends Model
{
    use SoftDeletes, TransformDates;

    protected $dates              = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden             = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable           = ['name', 'status', 'step', 'level'];
    protected $table              = 'broker_statuses';
    public $resource              = BrokerStatusResource::class;
    public $resourceCollection    = BrokerStatusCollection::class;

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

    public function brokers()
    {
        return $this->hasMany(User::class);
    }
}
