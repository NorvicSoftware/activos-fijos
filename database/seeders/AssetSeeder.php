<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset;

class AssetSeeder extends Seeder
{
    public function run()
    {
        $asset = new Asset();
        $asset->name = "Monitor Samsung";
        $asset->code = "123456";
        $asset->description = "Monitor Samsung de 20 pulgadas, color negro entrada HDMI";
        $asset->brand = "Samsung";
        $asset->model = "AS-455";
        $asset->series = "455433";
        $asset->exists = true;
        $asset->status = "Active";
        $asset->agency_id = 1;
        $asset->save();
    }
}