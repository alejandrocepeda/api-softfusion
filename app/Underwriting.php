<?php

namespace App;

use App\Http\Resources\UnderwritingCollection;
use App\Http\Resources\UnderwritingResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Underwriting extends Model
{
    use SoftDeletes, TransformDates;

    public $relationships         = [];
    public $resource              = UnderwritingResource::class;
    public $resourceCollection    = UnderwritingCollection::class;
    protected $dates              = ['deleted_at', 'created_at', 'updated_at', 'month'];
    protected $fillable           = ['bank_id',
                                     'application_id',
                                     'last_four_digits',
                                     'total_deposits',
                                     'number_deposits',
                                     'month',
                                     'ending_balance',
                                     'avg_daily_balance',
                                     'nsfs',
                                     'negative_days', ];

    /*
     |--------------------------------------------------------------------------
     | Relations database
     |--------------------------------------------------------------------------
     |
     */

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
