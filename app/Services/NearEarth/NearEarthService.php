<?php

namespace App\Services\NearEarth;

use App\Http\Resources\NearEarthResource;
use App\Models\NearEarth;
use App\Services\Http\HttpClient;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class NearEarthService
{
    public static function getHazardous() : JsonResource
    {
        $hazardousObj = NearEarth::query()
            ->where('is_hazardous', 1)
            ->get();
        return NearEarthResource::collection($hazardousObj);
    }

    public static function getFastestHazardous(array $property) : JsonResource
    {
        $is_hazardous = ((isset($property['hazardous'])) &&
            ($property['hazardous'] != null) &&
            (strtoupper($property['hazardous']) != "FALSE") &&
            (strtoupper($property['hazardous']) != "NULL")) ? true : false;
        $hazardousObj = NearEarth::query()
            ->where('is_hazardous', intval($is_hazardous))
            ->orderBy('speed', 'DESC')
            ->get();
        return NearEarthResource::collection($hazardousObj);
    }

    public static function getHazardousForNasa(array $properties) : void
    {
        try {
            $httpClient = new HttpClient(new Http());
            $response   = $httpClient->get('https://api.nasa.gov/neo/rest/v1/feed', $properties);
            // create queue
            //static::saveHazardousForNasa($response->json());
            Session::flash('info', isset($response->json()['element_count']) ? "Connection with NASA established. Loading data is queued. Number of data: {$response->json()['element_count']}." : "{$response->json()['http_error']}");
        } catch (\Exception $exception)
        {
            Session::flash('info', $exception->getMessage());
        }
    }

    public static function saveHazardousForNasa($data) : void
    {
        foreach ($data['near_earth_objects'] as $date => $near_earth_object)
        {
            foreach ($near_earth_object as $item){
                NearEarth::create([
                    'name' => $item['name'],
                    'reference' => $item['neo_reference_id'],
                    'speed' => $item['close_approach_data'][0]['relative_velocity']['kilometers_per_hour'],
                    'is_hazardous' => $item['is_potentially_hazardous_asteroid'],
                    'data' => $date,
                ]);
            }
        }
    }
}
