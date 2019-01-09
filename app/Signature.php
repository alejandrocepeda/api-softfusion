<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signature extends Model
{
    use SoftDeletes, TransformDates;

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $fillable = ['application_id',
                           'signature',
                           'contact_id',
                           'signer_ip',
                            ];
    /*
   |--------------------------------------------------------------------------
   | Relations Database
   |--------------------------------------------------------------------------
   |
   */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
