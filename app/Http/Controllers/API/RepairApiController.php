<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use App\Repositories\RepairRepository;

class RepairApiController extends Controller
{   

    // Index: List all repairs
    public function index()
    {
        $repairs = Repair::all();
        return response()->json(['repairs' => $repairs]);
    }

    // Show: Display a specific repair
    public function show($id)
    {
        $repair = Repair::findOrFail($id);
        return response()->json(['repair' => $repair]);
    }

    // Create: Store a new repair
    public function store(Request $request)
    {
        $request->validate([
            'repair_date' => 'required|date',
            'price' => 'required|float',
            'detail' => 'required|string'
        ]);
        $repair = new Repair();
        $repair->repair_date = $request->repair_date;
        $repair->price = $request->price;
        $repair->detail = $request->detail;
        $repair->asset_id = 1;
        $repair->save();

        return response()->json(['repair' => $repair], 201);
    }

    // Edit: Update an existing repair
    public function update(Request $request, $id)
    {
        $request->validate([
            'repair_date' => 'required|date',
            'price' => 'required|float',
            'detail' => 'required|string'
        ]);

        $repair = Repair::findOrFail($id);
        $repair->update($request->all());

        return response()->json(['message' => 'Repair updated successfully']);
    }

    // Destroy: Delete an agency
    public function destroy($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();

        return response()->json(['message' => 'Repair deleted successfully']);
    }
}
