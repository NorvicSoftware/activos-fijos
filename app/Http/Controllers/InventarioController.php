<?php


namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\ActivoFijo;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();
        return view('inventarios.index', compact('inventarios'));
    }

    public function show($id)
    {
        $inventario = Inventario::findOrFail($id);
        return view('inventarios.show', compact('inventario'));
    }

    public function create()
    {
        return view('inventarios.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario

        // Crear el inventario
        $inventario = Inventario::create($request->all());

        // Cambiar el estado del activo fijo a "Pendiente"
        $activoFijo = ActivoFijo::findOrFail($request->activo_fijo_id);
        $activoFijo->estado = 'Pendiente';
        $activoFijo->save();

        // Redireccionar
        return redirect()->route('inventarios.index')->with('success', 'Inventario creado exitosamente');
    }

    // Otros métodos como update() y delete()...

}
