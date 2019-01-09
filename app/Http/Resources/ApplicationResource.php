<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
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
        return ['id'                    => (int) $this->id,
                'status'                => (bool) $this->status,
                'exist_debt'            => (int) $this->exist_debt,
                'product_id'            => (int) $this->product_id,
                'bankruptcy'            => (bool) $this->bankruptcy,
                'collateral'            => (bool) $this->collateral,
                'documents'             => $this->documents_organized(),
                'processor_id'          => (int) $this->processor_id,
                'processor'             => $this->processor,
                'created_at'            => $this->created_at,
                'updated_at'            => $this->updated_at,
                'deleted_at'            => $this->deleted_at,
                'loan_amount'           => (int) $this->loan_amount,
                'application_status'    => $this->application_status,
                'application_status_id' => $this->application_status_id,
                'lead'                  => new LeadResource($this->lead),
                'product'               => new ProductResource($this->product),
                'underwritings'         => new UnderwritingCollection($this->underwritings),
                'client_advanceds'      => new ClientAdvancedCollection($this->clientAdvanceds),
                'matchs'                => $this->matchs(),
                'loan_purpose_id'       => (int) $this->loan_purpose_id,
                'loan_purpose'          => new LoanPurposeResource($this->loan_purpose), ];
    }
}
