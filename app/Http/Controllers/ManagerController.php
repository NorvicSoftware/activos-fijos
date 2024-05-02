<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = Manager::all();
        return Inertia::render('Manager/Index', ['managers' => $managers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Managers/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|min:5|max:75',
            'address' => 'required|max:75',
            'phone' => 'required|max:8',
            'charge'=> 'required|max:30',
        ]);

        $managers = new Manager();
        $managers->full_name = $request->full_name;
        $managers->address = $request->address;
        $managers->phone = $request->phone;
        $managers->charge =$request->charge;
        $managers->save();
        return Redirect::route('manager.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $managers = Manager::find($id);
        return Inertia::render('Managers/Show', ['managers' => $managers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $managers = Manager::find($id);
        return Inertia::render('Managers/Edit', ['managers' => $managers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'full_name' => 'required|min:5|max:75',
            'address' => 'required|max:75',
            'phone' => 'required|max:8',
            'charge'=> 'required|max:30',
        ]);

        $managers = Manager::find($id);
        $managers->full_name = $request->full_name;
        $managers->address = $request->address;
        $managers->phone = $request->phone;
        $managers->charge =$request->charge;
        $managers->save();

        return Redirect::route('manager.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $managers = Manager::find($id);
        $managers->delete();

        return Redirect::route('managers.index');
    }
}
