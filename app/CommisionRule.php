<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommisionRule extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['commision_type_id', 'dynamic_var_id',
                           'math_operator_id', 'value', 'commision', ];
    protected $hidden   = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    /*
    |--------------------------------------------------------------------------
    | Relations database
    |------------------------------------------------------------------------
    |
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function brokerInfo()
    {
        return $this->belongsToMany(BrokerInfo::class, 'broker_commision_rule');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commisionsType()
    {
        return $this->belongsTo(CommisionsType::class, 'commision_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dynamicVar()
    {
        return $this->belongsTo(DynamicVar::class, 'dynamic_var_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mathOperator()
    {
        return $this->belongsTo(MathOperator::class, 'math_operator_id');
    }
}
