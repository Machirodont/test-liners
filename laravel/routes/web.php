<?php

use App\Http\Controllers\ShipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ships', ShipController::class);
