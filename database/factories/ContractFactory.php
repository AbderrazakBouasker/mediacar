<?php

namespace Database\Factories;

use App\Models\Car;
use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_name'=>fake()->word(),
            'client_cin'=>fake()->randomNumber(5),
            'rent_start_date'=>fake()->dateTime(),
            'rent_end_date'=>fake()->dateTime(),
            'car_id'=>Car::factory(),
            'number_of_days'=>fake()->randomNumber(2),
            'price'=>fake()->randomFloat(1,10,500),
            'payment_status'=>fake()->boolean(),
        ];
    }
}
