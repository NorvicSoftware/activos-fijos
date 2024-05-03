<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;

class AssetAPIController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return response()->json(['assets' => $assets]);
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

        $asset = Asset::create($request->all());

        return response()->json(['asset' => $asset], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asset = Asset::findOrFail($id);
        return response()->json(['asset' => $asset]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5|max:75',
            'code' => 'required|min:5'
        ]);

        $asset = Asset::findOrFail($id);
        $asset->update($request->all());

        return response()->json(['message' => 'Asset updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return response()->json(['message' => 'Asset deleted successfully']);
    }
}