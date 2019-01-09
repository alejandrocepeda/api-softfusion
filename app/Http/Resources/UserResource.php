<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        return ['id'               => (int) $this->id,
                'name'             => (string) $this->name,
                'contact_id'       => (int) $this->contact_id,
                'email'            => (string) $this->email,
                'status'           => (bool) $this->status,
                'broker_status_id' => (int) $this->broker_status_id,
                'created_at'       => $this->created_at,
                'updated_at'       => $this->updated_at,
                'deleted_at'       => $this->deleted_at,
                'contact'          => $this->contact ? new ContactResource($this->contact) : null,
                'role'             => $this->roles->first(),
                'state'            => isset($this->contact->address->zipcode->city->state) ? $this->contact->address->zipcode->city->state : null,
                'image'            => (object) $this->image, ];
    }
}
