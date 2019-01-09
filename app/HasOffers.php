<?php

namespace App;

use App\Http\Resources\HasOfferCollection;
use App\Http\Resources\HasOfferResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HasOffers.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property string|null    $lead
 * @property string|null    $application
 * @property string         $transaction_id
 * @property string         $status
 * @property string         $transaction_date
 * @property string         $offer_id
 * @property string         $affiliate_id
 * @property string|null    $loan_approval
 * @property string|null    $commisions
 * @property string         $ip
 */
class HasOffers extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['lead_id',
                           'application_id',
                           'transaction_id',
                           'has_offer_status_id',
                           'offer_id',
                           'affiliate_id',
                           'broker_id',
                           'ip', ];
    protected $dates           = ['created_at', 'updated_at', 'deleted_at'];
    public $resource           = HasOfferResource::class;
    public $resourceCollection = HasOfferCollection::class;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hasOffersStatus()
    {
        return $this->belongsTo(HasOfferStatus::class, 'has_offer_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function broker()
    {
        return $this->belongsTo(User::class, 'broker_id');
    }
}
