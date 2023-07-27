<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->middleware('auth')->name('products.')->group(function () {
	Route::get('/products/create', 'create')->name('create');
	Route::post('/products', 'store')->name('store');
});