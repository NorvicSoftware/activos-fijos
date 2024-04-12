<?php

namespace Database\Factories;

use App\Models\Inventario;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'start-Date' => $this->faker->date,
            'final_date' => $this->faker->date,
            'details' => $this->faker->paragraph,
            'number_book' => $this->faker->numberBetween(1, 100),
            'manager_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
