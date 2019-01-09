<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityCollection extends ResourceCollection
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
            return ['id'                      => (int) $item->id,
                    'title'                   => (string) $item->title,
                    'source'                  => (string) $item->source,
                    'description'             => (string) $item->description,
                    'duration'                => (int) $item->duration,
                    'activity_type_id'        => (int) $item->activity_type_id,
                    'activity_status_id'      => (int) $item->activity_status_id,
                    'activity_status'         => $item->activityStatus,
                    'activity_call_status_id' => $item->activity_call_status_id,
                    'activity_call_status'    => $item->callStatus,
                    'user_id'                 => (int) $item->user_id,
                    'user'                    => $item->user ? (object) new UserResource($item->user) : null,
                    'assign_to'               => (int) $item->assign_to,
                    'assignto'                => $item->assignto ? (object) new UserResource($item->assignto) : null,
                    'assistants'              => $item->assistants ? new ContactCollection($item->assistants) : null,
                    'notified'                => (bool) $item->notified,
                    'email'                   => $item->email ? (object) new EmailResource($item->email) : null,
                    'created_at'              => $item->created_at,
                    'updated_at'              => $item->updated_at,
                    'finish_at'               => $item->finish_at,
                    'remember_at'             => $item->remember_at,
                    'deleted_at'              => $item->deleted_at, ];
        });
    }
}
