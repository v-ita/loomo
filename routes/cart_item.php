<?php

use App\Http\Controllers\CartItemController;
use Illuminate\Support\Facades\Route;

Route::controller(CartItemController::class)->middleware('auth')->name('cart_items.')->group(function () {
	Route::get('/cart_items/create', 'create')->name('create'); ## will be removed later as we don't need the form, just for test
	Route::post('/cart_items', 'store')->name('store');
});