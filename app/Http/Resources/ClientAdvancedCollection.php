<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClientAdvancedCollection extends ResourceCollection
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
            return ['id'             => (int) $item->id,
                    'lender_id'      => (int) $item->lender_id,
                    'lender'         => (object) $item->lender,
                    'application_id' => (int) $item->application_id,
                    'periodicity_id' => (int) $item->periodicity_id,
                    'periodicity'    => (object) $item->periodicity,
                    'payment'        => (int) $item->payment,
                    'amount'         => (int) $item->amount,
                    'funded_at'      => $item->funded_at,
                    'created_at'     => $item->created_at, ];
        });
    }
}
