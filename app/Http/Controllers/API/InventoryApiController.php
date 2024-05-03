<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryAPIController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return response()->json(['inventories' => $inventories]);
    }

  
    public function create()
    {
        // En un ApiController, probablemente no necesitarías una ruta para crear una vista.
        // En su lugar, puedes utilizar solicitudes POST para crear recursos.
    }

    public function read()
    {
        $assets = Asset::all();
        return response()->json(['assets' => $assets]);
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

        return response()->json(['message' => 'Inventario creado exitosamente.'], 201);
    }

    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        $assets = $inventory->assets()->get();
        return response()->json(['inventory' => $inventory, 'assets' => $assets]);
    }

    public function edit($id)
    {
        // En un ApiController, probablemente no necesitarías una ruta para editar una vista.
        // En su lugar, puedes utilizar solicitudes PUT o PATCH para actualizar recursos.
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

        return response()->json(['message' => 'Inventario actualizado exitosamente.']);
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return response()->json(['message' => 'Inventario eliminado exitosamente.']);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search_code' => 'required|string', // Validación del código de búsqueda
        ]);

        $searchCode = $request->input('search_code');
        $inventories = Inventory::where('code', 'LIKE', "%$searchCode%")->get();

        return response()->json(['inventories' => $inventories]);
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

        return response()->json(['message' => 'Estado del activo actualizado exitosamente.']);
    }
}
