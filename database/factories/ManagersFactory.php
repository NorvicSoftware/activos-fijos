<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ManagersFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'full_name' => $this->faker->full_name(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phone(),
            'charge' => $this->faker->name(),
        ];

    }
}
