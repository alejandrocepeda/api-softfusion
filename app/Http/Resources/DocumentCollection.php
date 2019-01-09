<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentCollection extends ResourceCollection
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
            return ['id'          => (int)$item->id,
                    'name'        => (string)$item->name,
                    'url'         => (string)url($item->url),
                    'received'    => (bool)$item->received,
                    'type'        => (object)$item->documentType,
                    'periodicity' => $item->periodicity ? (object)$item->periodicity : null,
                    'user'        => (object)$item->user,'size'          => (int)$item->size];
        });
    }
}
