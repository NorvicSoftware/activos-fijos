<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivoFijo;

class ActivoFijoSeeder extends Seeder
{
    public function run()
    {
        ActivoFijo::factory()->count(10)->create();
    }
}