<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientAdvancedResource extends JsonResource
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
        return ['id'             => (int) $this->id,
                'lender_id'      => (int) $this->lender_id,
                'lender'         => (object) $this->lender,
                'application_id' => (int) $this->application_id,
                'periodicity_id' => (int) $this->periodicity_id,
                'periodicity'    => (object) $this->periodicity,
                'payment'        => (int) $this->payment,
                'amount'         => (int) $this->amount,
                'funded_at'      => $this->funded_at,
                'created_at'     => $this->created_at, ];
    }
}
