<?php

namespace App\Http\Controllers;

use App\Models\ActivoFijo;
use Illuminate\Http\Request;

class InventoryApiController extends Controller
{
    public function show($id)
    {
        // Obtener los datos del activo fijo
        $activoFijo = ActivoFijo::findOrFail($id);

        // Retornar los datos del activo fijo
        return response()->json($activoFijo);
    }

    public function store(Request $request)
    {
        // Validar la petición
        $request->validate([
            'asset_id' => 'required|exists:activo_fijos,id',
        ]);

        // Obtener el activo fijo
        $activoFijo = ActivoFijo::findOrFail($request->activo_fijo_id);

        // Verificar si el activo fijo ya ha sido leído
        if ($activoFijo->estado === 'read') {
            return response()->json(['message' => 'The asset has already been read.'], 422);
        }

        // Actualizar el estado del activo fijo a 'Leído'
        $activoFijo->estado = 'read';
        $activoFijo->contador++;
        $activoFijo->save();

        return response()->json(['message' => 'Fixed asset status updated to "Read".']);
    }

    public function update(Request $request, $id)
    {
        // Obtener el activo fijo
        $activoFijo = ActivoFijo::findOrFail($id);

        // Verificar si el activo fijo ya ha sido leído
        if ($activoFijo->estado === 'read') {
            return response()->json(['message' => 'The asset has already been read.'], 422);
        }

        // Actualizar el estado del activo fijo a 'Leído'
        $activoFijo->estado = 'read';
        $activoFijo->save();

        return response()->json(['message' => 'Fixed asset status updated to "Read".']);
    }
}
