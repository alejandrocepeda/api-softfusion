<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LenderCollection extends ResourceCollection
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
            return ['id'            => (int) $item->id,
                    'name'          => (string) $item->name,
                    'email'         => (string) $item->email,
                    'min_loan_size' => (string) $item->min_loan_size,
                    'max_loan_size' => (string) $item->max_loan_size,
                    'status'        => ['name'  => (string) $item->status ? 'active' : 'inactive',
                                     'level'    => (string) $item->status ? 'success' : 'danger', ],
                    'created_at'    => $item->created_at,
                    'updated_at'    => $item->updated_at,
                    'deleted_at'    => $item->deleted_at,
                    'relations'     => ['contact' => ['name'  => isset($item->contact->name) ? (string) $item->contact->name : '',
                                                      'phone' => isset($item->contact->phone) ? (string) $item->contact->phone : '', ]], ];
        });
    }
}
