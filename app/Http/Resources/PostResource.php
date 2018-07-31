<?php

namespace App\Http\Resources;

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
            'links' => new LinkCollection($this->links),
        ];
    }
}
