<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DefaultController extends Controller
{
    public function index()
    {
        $data = ['hello' => 'MacPaw Internship 2022!'];
        return response()->json($data, Response::HTTP_OK);
    }
}
