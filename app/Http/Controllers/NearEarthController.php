<?php

namespace App\Http\Controllers;

use App\Services\NearEarth\NearEarthService;
use Illuminate\Http\Request;

class NearEarthController extends Controller
{
    public function getHazardous()
    {
        return NearEarthService::getHazardous();
    }


    public function getFastestHazardous(Request $request)
    {
        return NearEarthService::getFastestHazardous($request->all());
    }

    public function getHazardousForNasa()
    {
        $properties = [
            'start_date=2021-11-01',
            'end_date=2021-11-01',
            'api_key=Lw7a55sDVOMBGQiNiElWoK6CCZiJpcP0Bfgp8MHh'
        ];
        NearEarthService::getHazardousForNasa($properties);
        return redirect()->back();
    }
}
