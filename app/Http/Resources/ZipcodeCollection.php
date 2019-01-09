<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ZipcodeCollection extends ResourceCollection
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
            return ['zipcode'   => $item->id,
                    'latitude'  => $item->latitude,
                    'longitude' => $item->longitude,
                    'county'    => $item->county,
                    'city'      => new CityResource($item->city), ];
        });
    }
}
