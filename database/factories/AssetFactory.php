<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'code' => $this->faker->numberBetween(100, 100000),
            'description' => $this->faker->text(),
            'brand'=> $this->faker->text(),
            'model'=> $this->faker->text(),
            'series'=> $this->faker->text(),
            'exists'=> $this->faker->boolean(),
            'status'=> $this->faker->randomElement(['Active', 'Down']),
            //'agency_id' => \App\Models\Agency::factory()->create()->id,
        ];
    }
}
