<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        // Asset::factory()->count(50)->create();
        $asset = new Asset();
        $asset->name = "Escritorio ejecutivo";
        $asset->code = "123123";
        $asset->agency_id = 1;
        $asset->save();

        $asset1 = new Asset();
        $asset1->name = "Televisor Samsung";
        $asset1->code = "122333";
        $asset1->agency_id = 2;
        $asset1->save();

    }
}