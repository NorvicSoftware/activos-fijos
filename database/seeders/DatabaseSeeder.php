<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Asset;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Sembrar datos para Asset usando el seeder
        $this->call(AssetSeeder::class);
        
        // Sembrar datos para Inventario
        
        $this->call(InventorySeeder::class);

    }
}
