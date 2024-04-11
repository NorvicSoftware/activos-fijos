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

  $Managers= new Manager();
  $Managers->full_name = "jeo";
  $Managers->address ="Barrio coboce";
  $Managers->phone ="7747044";
  $Managers->charge ="Administrador";
  $Managers->save();

  $Managers2= new Manager();
  $Managers2->full_name = "Edmudno ";
  $Managers2->address ="km 12";
  $Managers2->phone ="76913090";
  $Managers2->charge ="Ventas";
  $Managers2->save();
    }
}
