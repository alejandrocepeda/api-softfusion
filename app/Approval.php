<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approval extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['lender_id', 'amount',
                           'periodicity_id', 'payback',
                           'terms', 'interest_rate', 'application_id',
                           'status', 'funded', ];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    /*
     |--------------------------------------------------------------------------
     | Relations database
     |--------------------------------------------------------------------------
     |
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lender()
    {
        return $this->belongsTo(Lender::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function periodiCity()
    {
        return $this->belongsTo(Periodicity::class, 'periodicity_id');
    }
}
