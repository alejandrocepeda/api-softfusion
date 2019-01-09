<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        
        return ['id'      => (int)$this->id,
                'name'    => (string)$this->name,
                'photo'   => url($this->image->url),
                'users'   => $this->users,
                'manager' => [
                    'id'    => $this->user->id,
                    'name'  => $this->user->name,
                    'photo' => $this->user->image->url,
                    'email' => $this->user->email,
                ]
        ];
    }
}
