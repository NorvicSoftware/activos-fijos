<?php

namespace App\Http\Controllers\API;

use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventarioController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $inventario = Inventario::findOrFail($id);
        return response()->json($inventario);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->cantidad_leidos++;
        $inventario->save();
        return response()->json(['message' => 'Estado del activo fijo actualizado a leído.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $inventario = Inventario::findOrFail($id);
        if ($inventario->cantidad_leidos > 0) {
            return response()->json(['message' => 'El activo ya ha sido leído previamente.'], 400);
        }
        $inventario->cantidad_leidos++;
        $inventario->save();
        return response()->json(['message' => 'Estado del activo fijo actualizado a leído.']);
    }
}
