<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use App\Rules\SpecArrayValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShipController extends Controller
{
    public function index(): View
    {
        $ships = Ship::orderBy('ordering')->paginate(10);
        return view('ships.index', compact('ships'));
    }

    public function create(): View
    {
        return view('ships.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
 //           'spec' => ['required', new SpecArrayValidator],
            'description' => 'required|string',
            'ordering' => 'nullable|integer',
            'state' => 'nullable|boolean',
        ]);

        $validated['spec'] = []; // array_values($validated['spec']);

        Ship::create($validated);

        return redirect()->route('ships.index')->with('success', 'Ship created successfully!');
    }

    public function show(Ship $ship): View
    {
        return view('ships.show', compact('ship'));
    }

    public function edit(Ship $ship): View
    {
        return view('ships.edit', compact('ship'));
    }

    public function update(Request $request, Ship $ship): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'spec' => ['required', new SpecArrayValidator],
            'description' => 'required|string',
            'ordering' => 'nullable|integer',
            'state' => 'nullable|boolean',
        ]);

        $validated['spec'] = array_values($validated['spec']);

        $ship->update($validated);

        return redirect()->route('ships.index')->with('success', 'Ship updated successfully!');
    }

    public function destroy(Ship $ship): RedirectResponse
    {
        $ship->delete();

        return redirect()->route('ships.index')->with('success', 'Ship deleted successfully!');
    }
}
