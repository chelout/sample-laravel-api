<?php

namespace App\Http\Resources;

use App\Link;
use Illuminate\Http\Request;

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
        $links = collect([
            'self' => new Link([
                'method' => 'get',
                'action' => route('api.users.show', $this->id),
            ]),
        ]);

        return [
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'api_token' => $this->when(
                    $this->canViewApiToken($request),
                    $this->api_token
                ),
                'created_at' => $this->created_at ? $this->created_at->toIso8601String() : '',
                'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : '',
            ],
            'links' => new LinkCollection($links),
        ];
    }

    protected function canViewApiToken(Request $request)
    {
        return $request->user('api') && $request->user('api')->id == $this->id;
    }
}
