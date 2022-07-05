<?php

namespace App\Http\Controllers;

use App\Services\NearEarth\NearEarthService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NearEarthController extends Controller
{
    public function getHazardous()
    {
        //
        return NearEarthService::getHazardous();
    }

    public function getFastestHazardous(Request $request)
    {
        return NearEarthService::getFastestHazardous($request->all());
    }

    public function getHazardousForNasa()
    {
        $date_current = Carbon::now();
        $date_last = Carbon::now();
        $date_last->subDays(3);
        $properties = [
            'start_date=' . $date_last->format('Y-m-d'),
            'end_date=' . $date_current->format('Y-m-d'),
            'api_key=' . env('NASA_API_KEY')
        ];
        NearEarthService::getHazardousForNasa($properties);
        return redirect()->back();
    }
}
