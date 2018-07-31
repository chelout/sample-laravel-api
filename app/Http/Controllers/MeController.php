<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

class MeController extends Controller
{
    public function __invoke()
    {
        return new UserResource($this->user);
    }
}
