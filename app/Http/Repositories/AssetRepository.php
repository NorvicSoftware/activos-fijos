<?php

namespace App\Repositories;

use App\Models\Asset;


class AssetRepository {

    public function getAssets() {
        $assets = Asset::all();
        return $assets;
    }


}