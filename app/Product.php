<?php

namespace App;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product.
 *
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property mixed          $applies
 * @property mixed          $lenders
 * @property string         $name
 * @property int            $commercial
 * @property int            $status
 */
class Product extends Model
{
    use SoftDeletes, TransformDates;

    protected $fillable           = ['name', 'commercial', 'status'];
    protected $hidden             = ['created_at', 'updated_at', 'deleted_at', 'pivot'];
    protected $dates              = ['created_at', 'updated_at', 'deleted_at'];
    public $resource              = ProductResource::class;
    public $resourceCollection    = ProductCollection::class;

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
     | Relations database
     |--------------------------------------------------------------------------
     |
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lenders()
    {
        return $this->belongsToMany(Lender::class, 'lender_product');
    }

    public function documents()
    {
        $types         = $this->documentType;
        
        $periodicities = $this->periodicity;
        $result        = collect();


        foreach ($types as $key => $item) {
            $data = ['type'        => ['id'    => (int) $item->id,
                                       'name'  => (string) $item->name, ],
                     'periodicity' => ['id'    => (int) $periodicities[$key]->id,
                                       'name'  => (string) $periodicities[$key]->name,
                                       'value' => (int) $periodicities[$key]->value, ],
                     'order'       => (int) $item->pivot->order,
                     'quantity'    => (int) $item->pivot->quantity,
                     'multiple'    => (bool) $item->pivot->multiple,
                     'required'    => (bool) $item->pivot->required,
                     'status'      => (bool) $item->pivot->status, ];

            $result->push($data);
        }

        return $result;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documentType()
    {
        return $this->morphToMany(DocumentType::class, 'documentable' ,'item_documents_type')->withPivot(['quantity',
                                                                                               'required',
                                                                                               'multiple',
                                                                                               'order',
                                                                                               'status',
                                                                                               'periodicity_id', ])->orderBy('document_type_id');
    }

    public function periodicity()
    {
        return $this->morphToMany(Periodicity::class, 'documentable','item_documents_type')->withPivot(['quantity',
                                                                                              'required',
                                                                                              'order',
                                                                                              'multiple',
                                                                                              'status',
                                                                                              'document_type_id', ])->orderBy('document_type_id');
    }
}
