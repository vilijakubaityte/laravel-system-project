<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "reg_number"=> strtoupper(fake()->bothify('???###')),
            "brand"=> fake()->firstName,
            "model"=> fake()->lastName,
            "owners_id"=>2
        ];
    }
}
