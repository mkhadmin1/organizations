<?php

namespace Database\Factories;

use App\Models\FuelSensor;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FuelSensor>
 */
class FuelSensorFactory extends Factory
{
    protected $model = FuelSensor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'vehicle_id' => Vehicle::all()->random()->id

        ];
    }
}
