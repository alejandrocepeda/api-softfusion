<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrokerInfo extends Model
{
	use SoftDeletes, TransformDates;
	
	protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
	protected $hidden   = ['brokertable_id', 'brokertable_type'];
	protected $fillable = ['brokertable_id',
	                       'brokertable_type',];
	
	/*
	|--------------------------------------------------------------------------
	| Relations Database
	|--------------------------------------------------------------------------
	|
	*/
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function brokertable()
	{
		return $this->morphTo();
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function teams()
	{
		return $this->morphTo(Team::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function users()
	{
		return $this->morphTo(User::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function documents()
	{
		return $this->morphToMany(Document::class, 'documentable', 'item_documents_type')->withPivot(['quantity',
		                                                                                              'required',
		                                                                                              'multiple',
		                                                                                              'order',
		                                                                                              'status',
		                                                                                              'periodicity_id',]);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function commisionRule()
	{
		return $this->belongsToMany(CommisionRule::class, 'broker_commision_rule');
	}
}
