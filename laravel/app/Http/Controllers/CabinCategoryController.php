<?php

namespace App\Http\Controllers;

use App\Enums\CabinCategoryTypeEnum;
use App\Http\Requests\StoreCabinCategoryRequest;
use App\Http\Requests\UpdateCabinCategoryRequest;
use App\Models\CabinCategory;
use App\Models\Ship;
use Illuminate\Validation\Rule;

class CabinCategoryController extends Controller
{
    public function create(int $ship_id)
    {
        $ship = Ship::findOrFail($ship_id);

        return view('cabin_category.create', compact('ship'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCabinCategoryRequest $request)
    {
        $validated = $request->validated();
        $validated['photos'] = [];
        CabinCategory::create($validated);

        return redirect()->route('ships.show', ['ship' => $validated['ship_id']])
            ->with('success', 'CabinCategory created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $cabinCategoryId)
    {
        $cabinCategory = CabinCategory::findOrFail($cabinCategoryId);
        return view('cabin_category.edit', compact('cabinCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCabinCategoryRequest $request)
    {
        $cabinCategory = CabinCategory::findOrFail($request->validated('cabin_category_id'));
        $cabinCategory->update($request->validated());

        return redirect()->route('ships.show', ['ship' => $cabinCategory->ship_id])
            ->with('success', 'Gallery item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $cabinCategoryId)
    {
        $cabinCategory = CabinCategory::findOrFail($cabinCategoryId);
        $cabinCategory->delete();

        return redirect()->route('ships.show', ['ship' => $cabinCategory->ship_id])
            ->with('success', 'ShipGallery deleted successfully!');
    }
}
