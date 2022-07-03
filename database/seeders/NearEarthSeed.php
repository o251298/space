<?php

namespace Database\Seeders;

use App\Models\NearEarth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NearEarthSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NearEarth::factory(10)->create();
    }
}
