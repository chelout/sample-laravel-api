<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyPost;
use App\Http\Requests\IndexPost;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexPost $request)
    {
        [
            'offset' => $offset,
            'limit' => $limit,
            'q' => $q,
        ] = $request->validated();

        $postsCount = Post::search($q)
            ->count();

        $posts = Post::search($q)
            ->offset($offset)
            ->limit($limit)
            ->orderByDesc('created_at')
            ->get();

        return new PostCollection($posts, [
            'overal' => $postsCount,
            'offset' => $offset,
            'limit' => $limit,
            'q' => $q,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post = new Post(
            $request->validated()
        );
        $post->user_id = $this->user->id;
        $post->save();

        return (new PostResource($post))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post                $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {
        $post->update(
            $request->validated()
        );

        return (new PostResource($post))
            ->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyPost $request, Post $post)
    {
        $post->delete();

        return response('', 204);
    }
}
