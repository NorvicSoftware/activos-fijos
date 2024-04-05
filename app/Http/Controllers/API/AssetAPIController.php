<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Repositories\AssetRepository;

class AssetAPIController extends Controller
{
    protected $assets;

    public function __construct(AssetRepository $assets)
    {
        $this->assets = $assets;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = $this->assets->getAssets();
        return response()->json(['asset' => $assets]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
