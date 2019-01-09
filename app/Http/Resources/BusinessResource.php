<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return ['id'                   => (int) $this->id,
                'name'                 => (string) $this->name,
                'years_in_business_id' => $this->years_in_business_id ? (int) $this->years_in_business_id : null,
                'annual_revenue_id'    => $this->annual_revenue_id ? (int) $this->annual_revenue_id : null,
                'credit_score_id'      => $this->credit_score_id ? (int) $this->credit_score_id : null,
                'industry_id'          => $this->industry_id ? (int) $this->industry_id : null,
                'how_do_you_hear_id'   => $this->how_do_you_hear_id ? (int) $this->how_do_you_hear_id : null,
                'phone'                => (string) $this->phone,
                'web'                  => (string) $this->web,
                'deleted_at'           => $this->deleted_at,
                'status'               => (bool) $this->status,
                'image'                => (object) $this->image,
                'address'              => new AddressResource($this->address),
                'contacts'             => new ContactCollection($this->contacts),
                //'photo'                => url($this->image->url),
                'industry'             => ['name' => isset($this->industries->name) ? (string) $this->industries->name : ''],
                'yearsinbusiness'      => ['name' => isset($this->yearsInBusiness->name) ? (string) $this->yearsInBusiness->name : '',
                                           'id'   => isset($this->yearsInBusiness->id) ? (int) $this->yearsInBusiness->id : '', ],
                'creditscore'          => ['name' => isset($this->creditScores->name) ? (string) $this->creditScores->name : '',
                                           'id'   => isset($this->creditScores->id) ? (int) $this->creditScores->id : '', ],
                'annualrevenue'        => ['name' => isset($this->annualRevenues->name) ? (string) $this->annualRevenues->name : '',
                                           'id'   => isset($this->annualRevenues->id) ? (int) $this->annualRevenues->id : '', ], ];
    }
}
