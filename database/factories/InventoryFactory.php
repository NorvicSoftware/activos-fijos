<?php
<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{


    public function definition(): array
    {
        return [
            'name' => $faker->sentence(),
            'start_date' => $faker->date(),
            'final_date' => $faker->date(),
            'details' => $faker->paragraph,
            'number_books' => $faker->numberBetween(1, 100),
            // Aquí podrías definir cómo obtener el manager_id, dependiendo de cómo estén configuradas tus relaciones en el modelo
            'manager_id' => \App\Models\Manager::factory()->create()->id,
        ];
    }
}
;
