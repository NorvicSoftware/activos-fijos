<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Motion;

class MotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Motion::factory()->count(50)->create();
    }
}
