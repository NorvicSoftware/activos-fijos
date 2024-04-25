<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Inertia\Inertia;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return Inertia::render('Assets/Index', ['assets' => $assets]);
        //return view('assets.index', ['assets' => $assets]);
    }

    public function create()
    {
        return Inertia::render('Assets/Create', ['id' => 0]);
        //return view('assets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:75',
            'code' => 'required|min:5'
        ]);
        
        $asset = new Asset();
        $asset->name = $request->name;
        $asset->code = $request->code;
        $asset->description = 'descripcion del activo fijo';
        $asset->agency_id = 1;
        $asset->save();

        // Asset::create($request->all());

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
        return Inertia::render('Assets/Create', ['asset' => $asset, 'id' => $id]);
        // return view('assets.edit', ['asset' => $asset]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5|max:75',
            'code' => 'required|min:5'
        ]);

        $asset = Asset::findOrFail($id);
        // $asset->update($request->all());
        // $asset = new Asset();
        $asset->name = $request->name;
        $asset->code = $request->code;
        // $asset->description = 'descripcion del activo fijo';
        // $asset->agency_id = 1;
        $asset->save();

        return redirect()->route('assets.index');
    }

    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect()->route('assets.index');
    }

    
}