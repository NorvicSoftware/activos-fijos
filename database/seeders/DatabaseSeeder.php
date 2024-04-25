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
        // $this->call(AssetSeeder::class);
        $this->call(ManagerSeeder::class);
        $this->call(AgencySeeder::class);
        $this->call(InventorySeeder::class);
        Asset::factory(50)->create();
        $this->call(RepairSeeder::class);


        
        // Sembrar datos para Inventario
        // Inventory::factory(50)->create() ;

    }
}
