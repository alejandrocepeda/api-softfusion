<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactCollection extends ResourceCollection
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
                    'name'       => (string) $item->name,
                    'email'      => (string) $item->email,
                    'phone'      => (string) $item->phone,
                    'status'     => ['name'  => (string) $item->status ? 'active' : 'inactive',
                                     'level' => (string) $item->status ? 'success' : 'danger', ],
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                    'deleted_at' => $item->deleted_at,
                    'photo'      => url($item->image->url),
                    'address'    => new AddressResource($item->address),

                    'relations' => ['state'    => ['name' => isset($item->business->address->zipcode->city->state->name) ? (string) $item->business->address->zipcode->city->state->name : null],
                                    'business' => ['name' => isset($item->business->name) ? (string) $item->business->name : null,
                                                   'web'  => isset($item->business->web) ? (string) $item->business->web : null, ], ],
            ];
        });
    }
}
