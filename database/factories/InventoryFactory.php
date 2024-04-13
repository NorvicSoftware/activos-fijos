<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inventory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
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
