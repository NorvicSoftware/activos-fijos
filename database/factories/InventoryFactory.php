<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{


    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'start_date' => $this->faker->date,
            'final_date' => $this->faker->date,
            'details' => $this->faker->paragraph,
            
            'number_books' => $this->faker->numberBetween(1, 100),
            // Puedes ajustar más campos según tus necesidades

        ];
    }
}
;
