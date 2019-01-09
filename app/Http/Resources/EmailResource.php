<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
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
        return ['id'                 => (int) $this->id,
                'email_template_id'  => (int) $this->email_template_id,
                'subject'            => (string) $this->subject,
                'body'               => (string) $this->body,
                'activity_id'        => (int) $this->activity_id,
                'from'               => [$this->sendertable],
                'to'                 => $this->to,
                'cc'                 => $this->cc,
                'bcc'                => $this->bcc,
                'activity_id'        => (int) $this->activity_id,
                'created_at'         => $this->created_at,
                'updated_at'         => $this->updated_at,
                'deleted_at'         => $this->deleted_at, ];
    }
}
