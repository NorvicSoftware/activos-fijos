<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function indexAction()
    {
        $agencies = Agency::all();
        return view('agencies.index', compact('agencies'));
    }
    public function create()
    {
        return view('agencies.create');
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
