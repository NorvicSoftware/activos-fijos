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
        return view('agencies.index', ['agencies' => $agencies]);
    }
    public function create()
    {
        return view('Agencies.create');
    }
    public function store(Request $request)
    {
        $agency = Agency::create($request->all());

        return redirect()->route('agencies.index')->with('success', 'Agency created successfully');
    }
    public function show(Agency $agency)
    {
        return view('agencies.show', compact('agency'));
    }
    public function edit(Agency $agency)
    {
        return view('agencies.edit', compact('agency'));
    }
    public function update(Request $request, Agency $agency)
    {
        $agency->update($request->all());

        return redirect()->route('agencies.index')->with('success', 'Agency updated successfully');
    }
    public function destroy(Agency $agency)
    {
        $agency->delete();

        return redirect()->route('agencies.index')->with('success', 'Agency deleted successfully');
    }
}
