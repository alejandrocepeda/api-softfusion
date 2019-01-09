<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
	use SoftDeletes, TransformDates;
	
	protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
	protected $hidden   = ['documentable_id', 'documentable_type'];
	protected $fillable = ['name',
						   'documentable_id',
						   'documentable_type',
						   'url',
						   'document_type_id',
						   'user_id',
						   'size',
						   'period',];
	
	/**
	 * @param $value
	 * @return string
	 */
	public function setNameAttribute($value)
	{
		return $this->attributes['name'] = strtolower($value);
	}
	
	/**
	 * @param $value
	 * @return string
	 */
	public function getNameAttribute($value)
	{
		return ucwords($value);
	}
	
	/*
	|--------------------------------------------------------------------------
	| Relations Database
	|--------------------------------------------------------------------------
	|
	*/
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function documentable()
	{
		return $this->morphTo();
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function applications()
	{
		return $this->morphTo(Application::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function brokerInfo()
	{
		return $this->morphTo(BrokerInfo::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function documentType()
	{
		return $this->belongsTo(DocumentType::class, 'document_type_id');
	}
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}
