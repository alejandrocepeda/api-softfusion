<?php

namespace App;

use App\Http\Resources\ActivityCollection;
use App\Http\Resources\ActivityResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable = ['title',
                           'description',
                           'activity_type_id',
                           'activity_status_id',
                           'activity_call_status_id',
                           'duration',
                           'user_id',
                           'assign_to',
                           'notified',
                           'activitytable_id',
                           'activitytable_type',
                           'finish_at',
                           'remember_at', ];
    public $resource           = ActivityResource::class;
    public $resourceCollection = ActivityCollection::class;
    protected $dates           = ['created_at', 'updated_at', 'deleted_at', 'finish_at', 'remember_at'];
    protected $hidden          = ['activitytable_id', 'activitytable_type'];
    public $relationships      = ['user.image',
                                'user.contact.image',
                                'user.contact.user',
                                'user.contact.address',
                                'user.contact.leads',
                                'user.roles',
                                'contacts.user',
                                'contacts.image',
                                'contacts.address',
                                'contacts.leads',
                                'activityStatus',
                                'callStatus',
                                'email',
                                'assignto.image',
                                'assignto.roles',
                                'assignto.contact.image',
                                'assignto.contact.user',
                                'assignto.contact.address',
                                'assignto.contact.leads',
                                'assistants.user',
                                'assistants.image',
                                'assistants.address',
                                'activitiesType', ];

    /**
     * @param $value
     *
     * @return string
     */
    public function SetTitleAttribute($value)
    {
        return $this->attributes['title'] = strtolower($value);
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function GetTitleAttribute($value)
    {
        return ucwords($value);
    }

    /*
     |--------------------------------------------------------------------------
     | Relations database
     |--------------------------------------------------------------------------
     |
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activitiesHistories()
    {
        return $this->hasMany(ActivitiesHistory::class, 'activity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activityStatus()
    {
        return $this->belongsTo(ActivitiesStatus::class, 'activity_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function activitytable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activitiesType()
    {
        return $this->belongsTo(ActivitiesType::class, 'activity_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function applications()
    {
        return $this->morphTo(Application::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignto()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assistants()
    {
        return $this->belongsToMany(Contact::class, 'activity_assistants');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function callStatus()
    {
        return $this->belongsTo(CallStatus::class, 'activity_call_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function contacts()
    {
        return $this->morphTo(Contact::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function email()
    {
        return $this->hasOne(Email::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function leads()
    {
        return $this->morphTo(Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function lenders()
    {
        return $this->morphTo(Lender::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
