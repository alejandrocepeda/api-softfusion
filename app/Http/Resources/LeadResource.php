<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
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
                'follow_up'      => (bool) $this->follow_up,
                'source'         => (string) $this->source,
                'executive_id'   => (int) $this->executive_id,
                'lead_status_id' => (int) $this->lead_status_id,
                'status'         => (bool) $this->status,
                'created_at'     => $this->created_at,
                'updated_at'     => $this->updated_at,
                'deleted_at'     => $this->deleted_at,
                'contact'        => $this->contact ? new ContactResource($this->contact) : null,
                'lead_status'    => $this->lead_status,
                'executive'      => $this->executive,
            ];
    }
}
