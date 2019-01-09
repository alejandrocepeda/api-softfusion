<?php

namespace App;

use App\Http\Resources\CallStatusCollection;
use App\Http\Resources\CallStatusResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallStatus extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable        = ['name'];
    public $resource           = CallStatusResource::class;
    public $resourceCollection = CallStatusCollection::class;
    protected $dates           = ['created_at', 'updated_at', 'deleted_at'];

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
}
