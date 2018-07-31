<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');

    }
}
