<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manager;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = new Manager();
        $manager->full_name = "Juan Perez";
        $manager->charge = "Encargado de Activos fijos";
        $manager->save();

        $manager1 = new Manager();
        $manager1->full_name = "Daniel Lopez";
        $manager1->charge = "Auxiliar de Activos fijos";
        $manager1->save();
    }
}
