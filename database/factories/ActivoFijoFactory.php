<?php

namespace Database\Factories;

use App\Models\ActivoFijo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivoFijoFactory extends Factory
{
    protected $model = ActivoFijo::class;
    public function definition()
    {
        return [
                'marca' => $this->faker->word,
                'modelo' => $this->faker->word,
                'serie' => $this->faker->word,
                'existencia' => $this->faker->randomElement(['Activo', 'Dado de bajo']),
                'eliminado' => $this->faker->boolean,
               // 'agencia_id' => \App\Models\Agencia::factory()->create()->id,
        ];
    }
}
