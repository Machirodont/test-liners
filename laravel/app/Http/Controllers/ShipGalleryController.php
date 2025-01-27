<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShipGalleryRequest;
use App\Http\Requests\UpdateShipGalleryRequest;
use App\Models\Ship;
use App\Models\ShipGallery;
use Illuminate\Http\Request;

class ShipGalleryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(int $ship_id)
    {
        $ship = Ship::findOrFail($ship_id);

        return view('ships_gallery.create', compact('ship'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShipGalleryRequest $request)
    {
        $validated = $request->validated();
        $validated['url'] = ShipGallery::NO_IMG_PLACEHOLDER;
        ShipGallery::create($validated);

        return redirect()->route('ships.show', ['ship' => $validated['ship_id']])
            ->with('success', 'Gallery item created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $shipGalleryId)
    {
        $shipGallery = ShipGallery::findOrFail($shipGalleryId);

        return view('ships_gallery.edit', compact('shipGallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipGalleryRequest $request, int $shipGalleryId)
    {
        $shipGallery = ShipGallery::findOrFail($shipGalleryId);
        $shipGallery->update($request->validated());

        return redirect()->route('ships.show', ['ship' => $shipGallery->ship_id])
            ->with('success', 'Gallery item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $shipGalleryId)
    {
        $shipGallery = ShipGallery::findOrFail($shipGalleryId);

        $shipGallery->delete();

        return redirect()->route('ships.show', ['ship' => $shipGallery->ship_id])
            ->with('success', 'ShipGallery deleted successfully!');
    }
}
