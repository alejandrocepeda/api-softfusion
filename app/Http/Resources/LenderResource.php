<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LenderResource extends JsonResource
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
        return ['id'                      => (int) $this->id,
                'name'                    => (string) $this->name,
                'email'                   => (string) $this->email,
                'min_loan_size'           => (int) $this->min_loan_size,
                'max_loan_size'           => (int) $this->max_loan_size,
                'min_terms'               => (int) $this->min_terms,
                'max_terms'               => (int) $this->max_terms,
                'min_interest'            => (float) $this->min_interest,
                'max_interest'            => (float) $this->max_interest,
                'max_loan_position'       => (int) $this->max_terms,
                'max_ltv'                 => (int) $this->max_terms,
                'negative_days'           => (int) $this->negative_days,
                'consolidation_refinance' => (bool) $this->consolidation_refinance,
                'weekly_payments'         => (bool) $this->weekly_payments,
                'puerto_rico'             => (bool) $this->puerto_rico,
                'favorite'                => (bool) $this->favorite,
                'status'                  => (bool) $this->status,
                'created_at'              => $this->created_at,
                'updated_at'              => $this->updated_at,
                'deleted_at'              => $this->deleted_at,
                'contact_id'              => $this->contact_id,
                'credit_score'            => $this->credit_score,
                'years_in_business'       => $this->years_in_business,
                'annual_revenue'          => $this->revenues,
                'image'                   => url($this->image->url),
                'contact_id'              => $this->contact_id,
                'contact'                 => new ContactResource($this->contact),
                //'lender_industries' => new LenderIndustryCollection($this->lender_industries)
                //'lender_states' => new LenderStateCollection($this->lender_states)
                //'lender_products' => new LenderProductCollection($this->lender_products)
            ];
    }
}
