<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Agency;

class AgencyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agency::class;

    /**
     * Define the model's default state.
     *
     * @param 
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'address' => fake()->address,
            'phoneNumber' => fake()->phoneNumber,
        ];
    }
}
