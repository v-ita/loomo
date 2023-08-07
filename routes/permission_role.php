<?php

use App\Http\Controllers\PermissionRoleController;
use Illuminate\Support\Facades\Route;

Route::controller(PermissionRoleController::class)->middleware('auth')->name('permission_role.')->group(function () {
	Route::get('/permission_roles/create', 'create')->name('create');
	Route::post('/permission_roles', 'store')->name('store');
});