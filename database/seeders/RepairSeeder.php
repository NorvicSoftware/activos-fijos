<?php

namespace Database\Seeders;

use App\Models\Repair;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $repair = new Repair();
        $repair->repair_date = "2024-04-24";
        $repair->price = 50.00;
        $repair->detail = "Reparacion del activo fijo";
        $repair->asset_id = 1;
        $repair->save();

    }
}
