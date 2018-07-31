<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexUser;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexUser $request)
    {
        [
            'offset' => $offset,
            'limit' => $limit,
            'q' => $q,
        ] = $request->validated();

        $usersCount = User::search($q)
            ->count();

        $users = User::search($q)
            ->offset($offset)
            ->limit($limit)
            ->get();

        return new UserCollection($users, [
            'overal' => $usersCount,
            'offset' => $offset,
            'limit' => $limit,
            'q' => $q,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }
}
