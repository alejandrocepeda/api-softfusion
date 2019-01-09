<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BusinessCollection extends ResourceCollection
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
            return ['id'                   => (int) $item->id,
                    'name'                 => (string) $item->name,
                    'years_in_business_id' => $item->years_in_business_id ? (int) $item->years_in_business_id : null,
                    'yearsinbusiness'      => $item->yearsInBusiness,
                    'annual_revenue_id'    => $item->annual_revenue_id ? (int) $item->annual_revenue_id : null,
                    'annualrevenue'        => $item->annualRevenues,
                    'credit_score_id'      => $item->credit_score_id ? (int) $item->credit_score_id : null,
                    'creditscore'          => $item->creditScores,
                    'industry_id'          => $item->industry_id ? (int) $item->industry_id : null,
                    'industry'             => $item->industries,
                    'how_do_you_hear_id'   => $item->how_do_you_hear_id ? (int) $item->how_do_you_hear_id : null,
                    'phone'                => (string) $item->phone,
                    'web'                  => (string) $item->web,
                    'phone'                => (string) $item->phone,
                    'web'                  => (string) $item->web,
                    'status'               => ['name'   => (string) $item->status ? 'active' : 'inactive',
                                               'level'  => (string) $item->status ? 'success' : 'danger',
                                               'status' => (bool) $item->status, ],
                    'deleted_at'           => $item->deleted_at,
                    'address'              => new AddressResource($item->address),
                    'state'                => isset($item->address->zipcode->city->state->name) ? (string) $item->address->zipcode->city->state->name : '',
            ];
        });
    }
}
