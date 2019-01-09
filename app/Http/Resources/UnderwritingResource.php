<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnderwritingResource extends JsonResource
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
        return ['id'                => (int) $this->id,
                'bank_id'           => (int) $this->bank_id,
                'bank'              => (object) $this->bank,
                'application_id'    => (int) $this->application_id,
                'last_four_digits'  => (int) $this->last_four_digits,
                'total_deposits'    => (int) $this->total_deposits,
                'number_deposits'   => (int) $this->number_deposits,
                'month'             => $this->month,
                'ending_balance'    => (int) $this->ending_balance,
                'avg_daily_balance' => (int) $this->avg_daily_balance,
                'nsfs'              => (int) $this->nsfs,
                'negative_days'     => (int) $this->negative_days,
                'created_at'        => $this->created_at, ];
    }
}
