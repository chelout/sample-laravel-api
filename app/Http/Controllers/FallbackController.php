<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

class FallbackController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'message' => 'Not Found.',
        ], 404);
    }
}
