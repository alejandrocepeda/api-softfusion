<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\address.
 *
 * @property mixed lead
 * @property mixed business
 * @property mixed leads
 * @property mixed businesses
 * @property mixed contacts
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Address onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Address withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Address withoutTrashed()
 * @mixin \Eloquent
 *
 * @property int                 $id
 * @property string              $address
 * @property string              $suite
 * @property string              $zipcode_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereSuite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereZipcodeId($value)
 */
class Address extends Model
{
    use SoftDeletes, TransformDates;

    protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
    protected $hidden   = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['address',
                           'suite',
                           'zipcode_id', ];

    /*
    |--------------------------------------------------------------------------
    | Relations Database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    public function zipcode()
    {
        return $this->belongsTo(Zipcode::class);
    }
}
