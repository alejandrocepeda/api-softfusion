<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
	use SoftDeletes, TransformDates;
	
	protected $dates    = ['deleted_at', 'created_at', 'updated_at'];
	protected $hidden   = ['deleted_at', 'created_at', 'updated_at'];
	protected $fillable = ['name',
	                       'status',];
	
	/**
	 * @param $value
	 *
	 * @return string
	 */
	public function setNameAttribute($value)
	{
		return $this->attributes['name'] = strtolower($value);
	}
	
	/**
	 * @param $value
	 *
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
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function documents()
	{
		return $this->hasMany(Document::class, 'document_type_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function product()
	{
		return $this->morphedByMany(Product::class, 'documentable', 'item_documents_type')
		            ->withPivot('quantity', 'order');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function brokerInfo()
	{
		return $this->morphedByMany(BrokerInfo::class, 'documentable', 'item_documents_type')
		            ->withPivot('quantity', 'order');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function periodicity()
	{
		return $this->morphedByMany(Periodicity::class, 'documentable', 'item_documents_type')
		            ->withPivot('quantity', 'order');
	}
}
