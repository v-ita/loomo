<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::controller(StoreController::class)->middleware('auth')->name('stores.')->group(function() {
    Route::get('/stores/create', 'create')->name('create');
    Route::post('/stores', 'store')->name('store');
});