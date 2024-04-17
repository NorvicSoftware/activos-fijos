<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));
    }

    public function create()
    {
        return view('inventories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'final_date' => 'required|date',
            'details' => 'nullable',
            'number_books' => 'nullable|integer',
            // Validar otros campos según sea necesario
        ]);

        $inventory = Inventory::create($request->all());

        // Aquí debes cambiar el estado del activo fijo a "Pendiente"

        return redirect()->route('inventories.index')
            ->with('success', 'Inventario creado exitosamente.');
    }

    // Define los métodos restantes (show, edit, update, destroy) según sea necesario
}
