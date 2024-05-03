<?php

namespace App\Http\Repositories;

use App\Models\Repair;


class AgencyRepository {

    public function getRepairs() {
        $repairs = Repair::where('assets_id', '<', 5)->get();
        return $repair;
    }


}