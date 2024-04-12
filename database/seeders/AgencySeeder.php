<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Factory;
use App\Models\Agency;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run()
    { 
        
        Agency::create([
            'name' => 'Acme Agency',
            'address' => '123 Main Street',
            'phoneNumber' => '555-555-5555'
        ]);

        Agency::create([
            'name' => 'Bravo Inc.',
            'address' => '456 Elm Street',
            'phoneNumber' => '666-666-6666'
        ]);

        //\App\Models\Agency::factory(5)->create(); 
    }
}
