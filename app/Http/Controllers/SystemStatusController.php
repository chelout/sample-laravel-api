<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemStatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return response()->json([
            'online' => true,
            'version' => config('app.version'),
        ]);
    }
}
