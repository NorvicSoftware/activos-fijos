<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('assets.index', ['assets' => $assets]);
    }

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:75',
            'code' => 'required|min:5'
        ]);

        Asset::create($request->all());

        return redirect()->route('assets.index');
    }

    public function show($id)
    {
        $asset = Asset::findOrFail($id);
        return view('assets.show', ['asset' => $asset]);
    }

    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        return view('assets.edit', ['asset' => $asset]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5|max:75',
            'code' => 'required|min:5'
        ]);

        $asset = Asset::findOrFail($id);
        $asset->update($request->all());

        return redirect()->route('assets.index');
    }

    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect()->route('assets.index');
    }
}