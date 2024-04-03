<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asset = new Asset();
        $asset->name = "Monitor Samsung";
        $asset->code = "123456";
        $asset->description = "Monitor Samsung de 20 pulgadas, color negro entrada HDMI";
        $asset->save();
    }
}
