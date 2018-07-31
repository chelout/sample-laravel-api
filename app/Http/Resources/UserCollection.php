<?php

namespace App\Http\Resources;

use App\Link;

class UserCollection extends BaseResourceCollection
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
        $links = collect([
            'self' => new Link([
                'method' => 'get',
                'action' => route('api.users.index'),
            ]),
        ]);

        return [
            'data' => UserResource::collection($this->collection),
            'links' => new LinkCollection($links),
            'meta' => $this->meta,
        ];
    }
}
