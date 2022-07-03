<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NearEarth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NearEarthFactory extends Factory
{
    protected $model = NearEarth::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'speed' => $this->faker->randomFloat(1.0, 0.0, 100000),
            'is_hazardous' => $this->faker->boolean(),
            'data' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
