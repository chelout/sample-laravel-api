<?php

namespace App\Http\Resources;

class LinkResource extends BaseJsonResource
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
        return [
            'method' => $this->method,
            'action' => $this->action,
        ];
    }
}
