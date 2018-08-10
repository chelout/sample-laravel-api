<?php

namespace App\Http\Resources;

use App\Link;
use Illuminate\Http\Request;

class PostResource extends BaseJsonResource
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
        $links = collect([
            'self' => new Link([
                'method' => 'get',
                'action' => route('api.posts.show', $this->id),
            ]),
        ]);

        if ($this->canViewModifyPost($request)) {
            $links = $links->merge([
                'update' => new Link([
                    'method' => 'put',
                    'action' => route('api.posts.update', $this->id),
                ]),
                'delete' => new Link([
                    'method' => 'delete',
                    'action' => route('api.posts.destroy', $this->id),
                ]),
            ]);
        }

        return [
            'id' => $this->id,
            'attributes' => [
                'user_id' => $this->user_id,
                'title' => $this->title,
                'body' => $this->body,
                'created_at' => $this->created_at ? $this->created_at->toIso8601String() : '',
                'updated_at' => $this->when($this->updated_at, function () {
                    return $this->updated_at->toIso8601String();
                }),
            ],
            'links' => new LinkCollection($links),
        ];
    }

    protected function canViewModifyPost(Request $request)
    {
        return $request->user('api') && $request->user('api')->id == $this->user_id;
    }
}
