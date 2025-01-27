<?php

use App\Http\Controllers\CabinCategoryController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\ShipGalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ships', ShipController::class);

Route::get('/ships_gallery/create/ship/{ship_id}', [ShipGalleryController::class, 'create'])->name('ships_gallery.create');
Route::post('/ships_gallery/store', [ShipGalleryController::class, 'store'])->name('ships_gallery.store');
Route::get('/ships_gallery/edit/{ships_gallery_id}', [ShipGalleryController::class, 'edit'])->name('ships_gallery.edit');
Route::put('/ships_gallery/{ships_gallery_id}', [ShipGalleryController::class, 'update'])->name('ships_gallery.update');
Route::delete('/ships_gallery/destroy/{ships_gallery_id}', [ShipGalleryController::class, 'destroy'])->name('ships_gallery.destroy');

Route::get('/cabin_category/create/ship/{ship_id}', [CabinCategoryController::class, 'create'])->name('cabin_category.create');
Route::delete('/cabin_category/destroy/{cabin_category_id}', [CabinCategoryController::class, 'destroy'])->name('cabin_category.destroy');
Route::post('/cabin_category/store', [CabinCategoryController::class, 'store'])->name('cabin_category.store');
Route::get('/cabin_category/edit/{cabin_category_id}', [CabinCategoryController::class, 'edit'])->name('cabin_category.edit');
Route::put('/cabin_category/{cabin_category_id}', [CabinCategoryController::class, 'update'])->name('cabin_category.update');
