<?php

namespace App\Http\Resources;

class LinkCollection extends BaseResourceCollection
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
        return LinkResource::collection($this->collection);
    }
}
