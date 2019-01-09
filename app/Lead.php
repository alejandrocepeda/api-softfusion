<?php

namespace App;

use App\Http\Resources\LeadCollection;
use App\Http\Resources\LeadResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lead.
 */
class Lead extends Model
{
    use SoftDeletes, TransformDates;

    public $relationships      = ['contact.business',
                                     'contact.address.zipcode.city.state',
                                     'lead_status',
                                     'executive', ];
    public $resource              = LeadResource::class;
    public $resourceCollection    = LeadCollection::class;
    protected $dates              = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable           = ['contact_id',
                                     'executive_id',
                                     'lead_status_id',
                                     'follow_up',
                                     'source',
                                     'status', ];

    /*
   |--------------------------------------------------------------------------
   | Relations Database
   |--------------------------------------------------------------------------
   |
   */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'activitytable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasOffers()
    {
        return $this->hasMany(HasOffers::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead_status()
    {
        return $this->belongsTo(LeadStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function read()
    {
        return $this->morphMany(ReadItem::class, 'readtable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function executive()
    {
        return $this->belongsTo(User::class);
    }
}
