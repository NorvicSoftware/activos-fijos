<?php

namespace Database\Factories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manager::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
{
    return [
        'full_name' => $this->faker->name,
        'address' => $this->faker->address,
        'phone' => $this->faker->numerify('##########'), // Genera un número de 10 dígitos
        'charge' => $this->faker->jobTitle,
    ];
}


}
