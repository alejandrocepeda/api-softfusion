<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UnderwritingCollection extends ResourceCollection
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
            return ['id'                 => (int) $item->id,
                    'bank_id'            => (int) $item->bank_id,
                    'bank'               => (object) $item->bank,
                    'application_id'     => (int) $item->application_id,
                    'last_four_digits'   => (int) $item->last_four_digits,
                    'total_deposits'     => (int) $item->total_deposits,
                    'number_deposits'    => (int) $item->number_deposits,
                    'month'              => $item->month,
                    'ending_balance'     => (int) $item->ending_balance,
                    'avg_daily_balance'  => (int) $item->avg_daily_balance,
                    'nsfs'               => (int) $item->nsfs,
                    'negative_days'      => (int) $item->negative_days,
                    'created_at'         => $item->created_at, ];
        });
    }
}
