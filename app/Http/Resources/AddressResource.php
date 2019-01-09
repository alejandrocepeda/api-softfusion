<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
        return ['id'         => (int) $this->id,
                'address'    => (string) $this->address,
                'suite'      => (string) $this->suite,
                'zipcode_id' => (string) $this->zipcode_id,
                'zipcode'    => new Zipcode($this->zipcode), ];
    }
}
