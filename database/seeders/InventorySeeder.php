<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventory = new Inventory();
        $inventory->name = "Invetario fisico gestion 2023";
        $inventory->start_date = "2023-12-01";
        $inventory->final_date = "2023-12-15";
        $inventory->details = "Se realizo el inventario fisico de la gestion 2023 los detalles son los siguientes:";
        $inventory->read = 500;
        $inventory->not_read = 200;
        $inventory->agency_id = 1;
        $inventory->manager_id = 1;
        $inventory->save();
    }
}
