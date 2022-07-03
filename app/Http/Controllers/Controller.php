<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function routeNotFound()
    {
        return \response()->json(['error' =>'Route: ' .  $_SERVER['REQUEST_URI'] . ' - does not exist'], Response::HTTP_NOT_FOUND);
    }
}
