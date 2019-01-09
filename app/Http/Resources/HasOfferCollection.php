<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HasOfferCollection extends ResourceCollection
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
            return ['transaction_id' => (string) $item->transaction_id,
                    'lead_id'        => (int) $item->lead_id,
                    'application_id' => (int) $item->application_id,
                    'offer_id'       => (int) $item->offer_id,
                    'affiliate_id'   => (int) $item->affiliate_id,
                    'ip'             => (string) $item->ip,
                    'created_at'     => $item->created_at,
                    'updated_at'     => $item->created_at,
                    'deleted_at'     => $item->deleted_at,
                    'relations'      => [$this->mergeWhen($item->lead, ['lead' => new LeadResource($item->lead)]),
                                         'approval'         => isset($item->application->funded->first()->amount) ? (string) $item->application->funded->first()->amount : (string) '0',
                                         'has_offer_status' => $item->hasOffersStatus ?: '',
                    ],
            ];
        });
    }
}

/*
 * $this->mergeWhen($item->lead->contact, ['contact' => ['name'  => (string)$item->lead->contact->name,
                                                                                                             'phone' => (string)$item->lead->contact->phone],
                                                                                               $this->mergeWhen($item->lead->contact->business, ['business' => ['name' => (string)$item->contact->business->name],]),]),
 */
