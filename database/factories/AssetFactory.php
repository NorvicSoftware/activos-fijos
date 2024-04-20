<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Asset;
use App\Models\Agency;

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
            'description' => $this->faker->text(250),
            'brand'=> $this->faker->text(75),
            'model'=> $this->faker->text(75),
            'series'=> $this->faker->text(35),
            'checked'=> $this->faker->boolean(),
            'status'=> $this->faker->randomElement(['Activo', 'Pasivo']),
            'agency_id' => Agency::all()->random()->id,
        ];
    }
}