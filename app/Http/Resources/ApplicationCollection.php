<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApplicationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return ['id'         => (int) $item->id,
                    'status'     => (bool) $item->status,
                    'product_id' => (int) $item->prduct_id,
                    'processor'  => $item->processor,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                    'deleted_at' => $item->deleted_at,
                    'relations'  => ['state'              => ['name' => isset($item->business->address->zipcode->city->state->name) ?: ''],
                                     'processor'          => ['name' => isset($item->processor->name) ?: ''],
                                     'lead'               => ['email' => $item->lead ? (string) $item->lead->email : '',
                                                              'id'    => $item->lead ? (int) $item->lead->id : '', ],
                                     'contact'            => ['name'  => (string) $item->lead->contact->name,
                                                              'phone' => (string) $item->lead->contact->phone, ],
                                     'business'           => ['name' => isset($item->business->name) ?: ''],
                                     'application_status' => ['id'    => (int) $item->application_status->id,
                                                              'name'  => (string) $item->application_status->name,
                                                              'level' => (string) $item->application_status->level, ],
                                     'executive'          => ['name' => (string) $item->lead->executive->name],
                                     'product'            => ['name' => isset($item->product->name) ?: ''], ], ];
        });
    }
}
