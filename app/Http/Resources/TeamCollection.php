<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeamCollection extends ResourceCollection
{
	/**
	 * Transform the resource collection into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		
		return $this->collection->transform(function($item){
			return ['id'            => (int)$item->id,
					'name'          => (string)$item->name,
                    'photo'         => url($item->image->url),
					'users'         => $item->users,
					'created_at'    => $item->created_at,
					'updated_at'    => $item->updated_at,
					'deleted_at'    => $item->deleted_at,
					'manager'       => [
                        'id'    => isset($item->user->id) ? $item->user->id : '',
                        'email' =>isset($item->user->email) ? $item->user->email : '',
                        'name'  => isset($item->user->name) ? $item->user->name : ''
                    ]
            ];
		});

	}
}
