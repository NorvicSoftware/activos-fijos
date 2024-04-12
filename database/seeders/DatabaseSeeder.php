<?php

namespace Database\Seeders;

use App\Models\Inventario;
use App\Models\Asset;

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

        
    }
}
