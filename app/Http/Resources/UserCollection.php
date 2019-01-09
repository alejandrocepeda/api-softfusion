<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
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
        return $this->collection->transform(function ($item) use ($request) {
            return ['id'         => (int) $item->id,
                    'name'       => (string) $item->name,
                    'email'      => (string) $item->email,
                    'role'       => (object) $item->roles->first(),
                    'status'     => ['name'  => (string) $item->status ? 'active' : 'inactive',
                                     'level' => (string) $item->status ? 'success' : 'danger', ],
                    'contact'    => new ContactResource($item->contact),
                    'business'   => isset($item->contact->business) ? $item->contact->business : null,
                    'state'      => isset($item->contact->address->zipcode->city->state) ? $item->contact->address->zipcode->city->state : null,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                    'deleted_at' => $item->deleted_at,
                    'photo'      => url($item->image->url), ];
        });
    }
}
