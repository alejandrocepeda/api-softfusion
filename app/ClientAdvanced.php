<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientAdvanced extends Model
{
    use SoftDeletes, TransformDates;

    //public    $resource           = '';
    //public    $resourceCollection = '';
    protected $dates    = ['deleted_at', 'created_at', 'updated_at', 'funded_at'];
    protected $fillable = ['lender_id',
                           'periodicity_id',
                           'application_id',
                           'payment',
                           'amount',
                           'funded_at', ];

    /*
   |--------------------------------------------------------------------------
   | Relations Database
   |--------------------------------------------------------------------------
   |
   */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lender()
    {
        return $this->belongsTo(User::class, 'lender_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodicity()
    {
        return $this->belongsTo(Periodicity::class, 'periodicity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
        return $this->belongsTo(Application::class, 'lender_id');
    }
}
