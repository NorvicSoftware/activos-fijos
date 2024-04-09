<?php

namespace App\Http\Repositories;

use App\Models\Asset;


class AssetRepository {

    public function getAssets() {
        $assets = Asset::where('id', '<', 5)->get();
        return $assets;
    }


}