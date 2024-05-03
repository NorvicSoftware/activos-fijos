<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repair;
use Inertia\Inertia;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repairs = Repair::all();
        return Inertia::render('Repairs/Index', ['repairs' => $repairs]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Repairs/Create', ['id' => 0]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'repair_date' => 'required',
            'price' => 'required',
            'detail' => 'required',
            'asset_id' => 'required',
        ]);

        $repair = new Repair();
        $repair->repair_date = $request->repair_date;
        $repair->price = $request->price;
        $repair->detail = $request->detail;
        $repair->save();
        
        return redirect()->route('repairs.index')->with('success', 'Reparacion creado exitosamente.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $repair = Repair::find($id);
        return Inertia::render('Repairs/Create', ['repair' => $repair, 'id' => 0]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'repair_date' => 'required',
            'price' => 'required',
            'detail' => 'required',
            'asset_id' => 'required',
        ]);

        $repair = Repair::find($id);
        $repair->repair_date = $request->repair_date;
        $repair->price = $request->price;
        $repair->detail = $request->detail;
        $repair->repair_id = $request->repair_id;
        $repair->save();
        
        return redirect()->route('repairs.index')->with('success', 'Reparacion creado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
