<?php

namespace App\Console\Commands;
use App\Services\NearEarth\NearEarthService;
use Carbon\Carbon;
use Illuminate\Console\Command;
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
        $date_current = Carbon::now();
        $date_last = Carbon::now();
        $date_last->subDays(3);
        $properties = [
            'start_date=' . $date_last->format('Y-m-d'),
            'end_date=' . $date_current->format('Y-m-d'),
            'api_key=' . env('NASA_API_KEY')
        ];
        NearEarthService::getHazardousForNasa($properties);
    }
}
