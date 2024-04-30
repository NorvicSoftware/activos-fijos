<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;
use Inertia\Inertia;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::all();
        return Inertia::render('Agencies/Index', ['agencies' => $agencies]);
        //return view('agencies.index', compact('agencies'));
    }
    
    public function create()
    {
        return Inertia::render('agencies/create', ['id' => 0]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:75',
            'address' => 'required|min:5',
            'phoneNumber' => 'required|min:5|max:25'
        ]);

        $agency = new Agency();
        $agency->name = $request->name;
        $agency->address = $request->address;
        $agency->phoneNumber = $request->phoneNumber;
        $agency->agency_id = 1;
        $agency->save();

        return redirect()->route('agencies.index');
    }
    public function show($id)
    {
        $agency = Agency::findOrFail($id);
        return view('agencies.show', ['agency' => $agency]);
    }
    public function edit($id)
    {
        $agency = Agency::findOrFail($id);
        return Inertia::render('Agencies/Create', ['agency' => $agency, 'id' => $id]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5|max:75',
            'address' => 'required|min:5',
            'phoneNumber' => 'required|min:5|max:25'
        ]);

        $agency = Agency::findOrFail($id);
        $agency->name = $request->name;
        $agency->save();

        return redirect()->route('agencies.index');
    }
    public function destroy(Agency $agency)
    {
        $agency = Agency::findOrFail($id);
        $agency->delete();

        return redirect()->route('agencies.index')->with('success', 'Agency deleted successfully');
    }
}
