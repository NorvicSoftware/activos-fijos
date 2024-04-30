<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use App\Repositories\AgencyRepositoryInterface;

class AgencyApiController extends Controller
{   

    // Index: List all agencies
    public function index()
    {
        $agencies = Agency::all();
        return response()->json(['agencies' => $agencies]);
    }

    // Show: Display a specific agency
    public function show($id)
    {
        $agency = Agency::findOrFail($id);
        return response()->json(['agency' => $agency]);
    }

    // Create: Store a new agency
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phoneNumber' => 'required|string',
        ]);
        $agency = new Asset();
        $agency->name = $request->name;
        $agency->address = $request->address;
        $agency->phoneNumber = $request->phoneNumber;
        $agency->agency_id = 1;
        $agency->save();

        return response()->json(['agency' => $agency], 201);
    }

    // Edit: Update an existing agency
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        $agency = Agency::findOrFail($id);
        $agency->update($request->all());

        return response()->json(['message' => 'Agency updated successfully']);
    }

    // Destroy: Delete an agency
    public function destroy($id)
    {
        $agency = Agency::findOrFail($id);
        $agency->delete();

        return response()->json(['message' => 'Agency deleted successfully']);
    }
}
