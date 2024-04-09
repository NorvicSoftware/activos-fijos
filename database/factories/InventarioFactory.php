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
            'Nombre' => $this->faker->sentence,
            'fecha_inicio' => $this->faker->date,
            'fecha_final' => $this->faker->date,
            'detalle' => $this->faker->paragraph,
            'cantidad_leidos' => $this->faker->numberBetween(1, 100),
            'encargado_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
