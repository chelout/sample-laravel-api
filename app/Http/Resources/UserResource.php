<?php

namespace App\Http\Resources;

class UserResource extends BaseJsonResource
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
                'name' => $this->name,
                'email' => $this->email,
                'api_token' => $this->when($request->user('api')->id == $this->id, $this->api_token),
                'created_at' => $this->created_at ? $this->created_at->toIso8601String() : '',
                'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : '',
            ],
            'links' => new LinkCollection($this->links),
        ];
    }
}
