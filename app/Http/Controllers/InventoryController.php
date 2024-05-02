<?php
namespace App\Http\Controllers;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\Inventory;
use Inertia\Inertia;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return Inertia::render('Inventories/Index', ['inventories' => $inventories]);
    }

    public function create()
    {
        return Inertia::render('Inventories/Create' );
    }

    public function read()
    {
        $assets = Asset::all();

        return Inertia::render('Inventories/Read',['assets' => $assets ] );

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_Date' => 'required|date',
            'final_date' => 'required|date',
            'details' => 'nullable',
            'read' => 'nullable|integer',
            'not_read' => 'nullable|integer',
            // Agrega validación para otros campos según sea necesario
        ]);

        $inventory = Inventory::create($request->all());

        return redirect()->route('inventories.index')
            ->with('success', 'Inventario creado exitosamente.');
    }

    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        
        // Obtener los activos asociados a esta entrada de inventario
        $assets = $inventory->assets()->get();
        
        // También puedes cargar la relación con eager loading para evitar N+1 queries
        // $inventory->load('assets');

        return Inertia::render('Inventories/Show', ['inventory' => $inventory, 'assets' => $assets]);
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return Inertia::render('Inventories/Create', ['inventory' => $inventory, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'final_date' => 'required|date',
            'details' => 'nullable',
            'read' => 'nullable|integer',
            'not_read' => 'nullable|integer',
            // Agrega validación para otros campos según sea necesario
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());

        return redirect()->route('inventories.index')
            ->with('success', 'Inventario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventories.index')
            ->with('success', 'Inventario eliminado exitosamente.');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search_code' => 'required|string', // Validación del código de búsqueda
        ]);

        $searchCode = $request->input('search_code');

        // Realizar la búsqueda de inventarios por código
        $inventories = Inventory::where('code', 'LIKE', "%$searchCode%")->get();

        return Inertia::render('Inventories/SearchResults', ['inventories' => $inventories]);
    }

    public function updateAssetStatus(Request $request, $inventoryId, $assetId)
{
    $request->validate([
        'status' => 'required|in:Activo,Pasivo', // Asegúrate de que el estado solo pueda ser "Activo" o "Pasivo"
    ]);

    $inventory = Inventory::findOrFail($inventoryId);
    $asset = $inventory->assets()->findOrFail($assetId);
    $asset->status = $request->input('status');
    $asset->save();

    return redirect()->back()->with('success', 'Estado del activo actualizado exitosamente.');
}


    

}
