<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class YearsInBusinessResource extends JsonResource
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
        return ['id'     => (int) $this->id,
                'name'   => (string) $this->name,
                'order'  => (int) $this->order,
                'value'  => (int) $this->value,
                'status' => ['name'  => (string) $this->status ? 'active' : 'inactive',
                             'level' => (string) $this->status ? 'success' : 'danger', ], ];
    }
}
