<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
        return ['id'              => (int) $this->id,
                'name'            => (string) $this->name,
                'email'           => (string) $this->email,
                'phone'           => (string) $this->phone,
                'social_security' => (string) $this->social_security,
                'birthdate'       => (string) $this->birthdate,
                'ownership'       => (string) $this->ownership,
                'status'          => (bool) $this->status,
                'created_at'      => $this->created_at,
                'updated_at'      => $this->updated_at,
                'deleted_at'      => $this->deleted_at,
                'user'            => $this->user,
                'address'         => new AddressResource($this->address),
                'photo'           => url($this->image->url),
                'business_id'     => $this->business_id,
                'lead'            => $this->leads,
        ];
    }
}
