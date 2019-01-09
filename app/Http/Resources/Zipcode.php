<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

/**
 * Class Zipcode.
 *
 * @property mixed city
 * @property mixed county
 * @property mixed longitude
 * @property mixed latitude
 * @property mixed id
 */
class Zipcode extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return ['zipcode'   => $this->id,
                'latitude'  => $this->latitude,
                'longitude' => $this->longitude,
                'county'    => $this->county,
                'city'      => new CityResource($this->city), ];
    }
}
