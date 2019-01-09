<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
        return ['id'                      => (int) $this->id,
                'title'                   => (string) $this->title,
                'source'                  => (string) $this->source,
                'description'             => (string) $this->description,
                'duration'                => (int) $this->duration,
                'activity_type_id'        => (int) $this->activity_type_id,
                'activity_status_id'      => (int) $this->activity_status_id,
                'activity_status'         => $this->activityStatus,
                'activity_call_status_id' => $this->activity_call_status_id,
                'activity_call_status'    => $this->callStatus,
                'user_id'                 => (int) $this->user_id,
                'user'                    => $this->user ? new UserResource($this->user) : null,
                'assign_to'               => (int) $this->assign_to,
                'assignto'                => $this->assignto ? new UserResource($this->assignto) : null,
                'assistants'              => $this->assistants ? new ContactCollection($this->assistants) : null,
                'notified'                => (bool) $this->notified,
                'email'                   => $this->email ? new EmailResource($this->email) : null,
                'created_at'              => $this->created_at,
                'updated_at'              => $this->updated_at,
                'finish_at'               => $this->finish_at,
                'remember_at'             => $this->remember_at,
                'deleted_at'              => $this->deleted_at, ];
    }
}
