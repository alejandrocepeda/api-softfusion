<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periodicity extends Model
{
    use SoftDeletes, TransformDates;

    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden   = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['name',
                           'value',
                           'status', ];

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
    public function approvals()
    {
        return $this->hasMany(Approval::class, 'periodicity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentsPreridiCity()
    {
	    return $this->morphedByMany(DocumentPeriodicity::class, 'documentable', 'item_documents_type')
	                ->withPivot('quantity', 'order');
    }
    
    
}
