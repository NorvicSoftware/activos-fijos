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
    public function definition()
    {
        return [
            'name' => faker()->company(),
            'address' => faker()->address,
            'phoneNumber' => faker()->phoneNumber,
        ];
    }
}
