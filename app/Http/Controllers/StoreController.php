<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Store/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        $validated = $request->validated();
        
        $user = User::find(auth()->id());
        $store = new Store($validated);
        
		$user->stores()->save($store);
		return redirect()->route(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return Inertia::render('Store/Edit', [
            'store' => $store
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $validated = $request->validated();

        # remove required fields which are null in the validated data but it should not be null
        $validated =  array_filter($validated, function ($value, $key) {
            if ($key == 'name' || $key == 'slug') {
                return !(is_null($value) || empty($value));
            }
            return true;
        }, ARRAY_FILTER_USE_BOTH);

        $store->update($validated);
        return redirect()->route(RouteServiceProvider::HOME);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
