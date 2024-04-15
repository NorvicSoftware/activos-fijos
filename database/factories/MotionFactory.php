<?php

namespace Database\Factories;

use App\Models\Motion;
use App\Models\Asset;
use App\Models\Agency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motion>
 */
class MotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date,
            'detail' => $this->faker->sentence,
            'asset_id' => Asset::factory(),  // Asume que tienes una AssetFactory
            'agency_previous_id' => Agency::factory(),  // Asume que tienes una AgencyFactory para la agencia anterior
            'agency_current_id' => Agency::factory()  // Asume que tienes una AgencyFactory para la agencia actual
        ];    
        
    }
}
