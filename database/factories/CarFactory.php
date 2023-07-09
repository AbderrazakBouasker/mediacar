<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->word(),
            'model'=>fake()->word(),
            'platenumber'=>fake()->randomNumber(6),
            'status'=>fake()->text(10),
            'description'=>fake()->text(20),
            'fueltype'=>fake()->word(),
            'gearbox'=>fake()->word(),
            'numberofseats'=>fake()->randomDigit(),
            'horsepower'=>fake()->randomNumber(2),
            'availability'=>fake()->boolean(),

        ];
    }
}
