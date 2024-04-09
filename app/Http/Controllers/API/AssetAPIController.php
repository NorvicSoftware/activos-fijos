<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Http\Repositories\AssetRepository;

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
        $request->validate([
            'name' => 'required|min:5|max:75',
            'code' => 'required|min:5'
        ]);

        $asset = new Asset();
        $asset->name = $request->name;
        $asset->code = $request->code;
        $asset->description = $request->description;
        $asset->save();

        return response()->json(['OK' => 'OK']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asset = Asset::find($id);
        return response()->json(['asset' => $asset]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:5|max:75',
            'code' => 'required|min:5'
        ]);

        $asset = Asset::find($id);
        $asset->name = $request->name;
        $asset->code = $request->code;
        $asset->description = $request->description;
        $asset->save();

        return response()->json(['EL ACTIVO FIJO:' => $asset->name]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
