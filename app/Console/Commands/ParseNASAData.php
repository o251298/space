<?php

namespace App\Console\Commands;

use App\Services\Http\HttpClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\NearEarth;
class ParseNASAData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:asteroid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $test = new HttpClient(new Http);
        $response = Http::get('https://api.nasa.gov/neo/rest/v1/feed?start_date=2021-11-01&end_date=2021-11-01&api_key=Lw7a55sDVOMBGQiNiElWoK6CCZiJpcP0Bfgp8MHh');
        foreach ($response->json()['near_earth_objects'] as $date => $near_earth_object)
        {
            foreach ($near_earth_object as $item){
                $obj = NearEarth::create([
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
