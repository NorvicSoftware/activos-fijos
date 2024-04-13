<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Asset;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @param 
     * @return array
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
            'agency_id' => \App\Models\Agency::factory()->create()->id,
        ];
    }
}