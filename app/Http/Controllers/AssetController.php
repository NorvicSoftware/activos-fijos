<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Repositories\AssetRepository;

class AssetController extends Controller
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
        return Inertia::render('Assets/Index', ['assets' => $assets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Assets/Create');
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

        return Redirect::route('assets.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asset = Asset::find($id);
        return Inertia::render('Assets/Show', ['asset' => $asset]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //no se utilice
        $asset = Asset::find($id);
        return Inertia::render('Assets/Edit', ['asset' => $asset]);
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

        return Redirect::route('assets.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asset = Asset::find($id);
        $asset->delete();

        return Redirect::route('assets.index');
    }
}
