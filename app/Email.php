<?php

namespace App;

use App\Http\Resources\EmailCollection;
use App\Http\Resources\EmailResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable           = ['email_template_id',
                                     'subject',
                                     'activity_id',
                                     'body',
                                     'sendertable_id',
                                     'sendertable_type', ];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at'];
    public $resource              = EmailResource::class;
    public $resourceCollection    = EmailCollection::class;

    /*
    |--------------------------------------------------------------------------
    | Relations database
    |------------------------------------------------------------------------
    |
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emailTemplate()
    {
        return $this->belongsTo(EmailsTemplate::class, 'email_template_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sendertable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function contact()
    {
        return $this->morphedByMany(Contact::class, 'receivertable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function to()
    {
        return $this->morphedByMany(Contact::class, 'receivertable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cc()
    {
        return $this->morphedByMany(Contact::class, 'receivertable')->withPivot('type')->wherePivot('type', '=', 'cc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bcc()
    {
        return $this->morphedByMany(Contact::class, 'receivertable')->withPivot('type')->wherePivot('type', '=', 'bcc');
    }
}
