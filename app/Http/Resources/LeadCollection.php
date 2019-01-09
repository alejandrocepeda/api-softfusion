<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LeadCollection extends ResourceCollection
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
                    'follow_up'  => (bool) $item->follow_up,
                    'source'     => (string) $item->source,
                    'status'     => (bool) $item->status,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                    'deleted_at' => $item->deleted_at,
                    'relations'  => ['contact'     => ['name'  => isset($item->contact->name) ? (string) $item->contact->name : '',
                                                       'email' => isset($item->contact->email) ? (string) $item->contact->email : '',
                                                       'phone' => isset($item->contact->phone) ? (string) $item->contact->phone : '',
                                                       'state' => isset($item->contact->address->zipcode->city->state->name) ? (string) $item->contact->address->zipcode->city->state->name : '', ],
                                     'business'    => ['name' => isset($item->contact->business->name) ? (string) $item->contact->business->name : ''],
                                     'lead_status' => ['id'    => isset($item->lead_status->id) ? (int) $item->lead_status->id : '',
                                                       'name'  => isset($item->lead_status->name) ? (string) $item->lead_status->name : '',
                                                       'level' => isset($item->lead_status->level) ? (string) $item->lead_status->level : '', ],
                                     'executive'   => ['name'  => isset($item->executive->name) ? (string) $item->executive->name : '',
                                                       'id'    => isset($item->executive->id) ? (int) $item->executive->id : '', ], ], ];
        });
    }
}
