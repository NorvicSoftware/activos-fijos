<?php

namespace Database\Seeders;

use App\Models\Inventario;
use App\Models\Asset;
use App\Models\Manager;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Sembrar datos para Asset
        $this->call(AssetSeeder::class);
        Asset::factory(50)->create();

        $this->call(ManagerSeeder::class);
        Manager::factory(10)->create();






        // Sembrar datos para Inventario
        //Inventario::factory(50)->create();
    }
}

