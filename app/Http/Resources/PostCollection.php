<?php

namespace App\Http\Resources;

use App\Link;

class PostCollection extends BaseResourceCollection
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
                'action' => route('api.posts.index'),
            ]),
            'create' => new Link([
                'method' => 'post',
                'action' => route('api.posts.store'),
            ]),
        ]);

        return [
            'data' => PostResource::collection($this->collection),
            'links' => new LinkCollection($links),
            'meta' => $this->meta,
        ];
    }
}
