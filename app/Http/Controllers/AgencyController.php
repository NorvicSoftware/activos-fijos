<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function indexAction()
    {
        $agency = Agency::all();
        return view('agency.index', compact('agency'));
    }
}
