<?php

namespace App\Http\Controllers;

use App\Http\Resources\NearEarthResource;
use App\Models\NearEarth;
use Illuminate\Http\Request;

class NearEarthController extends Controller
{
    public function getHazardous()
    {
        $hazardousObj = NearEarth::query()->where('is_hazardous', 1)->get();
        return NearEarthResource::collection($hazardousObj);
    }


    public function getFastestHazardous(Request $request)
    {
        $is_hazardous = (($request->hazardous != null) && (strtoupper($request->hazardous) != "FALSE") && (strtoupper($request->hazardous) != "NULL")) ? true : false;
        $hazardousObj = NearEarth::query()->where('is_hazardous', intval($is_hazardous))->orderBy('speed', 'DESC')->get();
        return NearEarthResource::collection($hazardousObj);
    }
}
