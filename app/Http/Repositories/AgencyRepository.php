<?php

namespace App\Http\Repositories;

use App\Models\Agency;


class AgencyRepository {

    public function getAgencies() {
        $agencies = Agency::where('id', '<', 5)->get();
        return $agency;
    }


}