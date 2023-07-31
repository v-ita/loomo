<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;

class ProductController extends Controller
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
        return Inertia::render('Product/Create', [
            'categories' => Category::all(),
            'stores' => Store::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $user = User::find(auth()->id());
        $product = new Product($validated);

        if (isset($validated['category_id'])) {
            $category = Category::find($validated['category_id']);
            $product->category()->associate($category);
        }

        if (isset($validated['store_id'])) {
            $store = Store::find($validated['store_id']);
            $product->store()->associate($store);
        }

        $user->products()->save($product);

        return redirect()->route(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return Inertia::render('Product/Edit', [
            'product' => $product,
            'categories' => Category::all(),
            'stores' => Store::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        # remove required fields which are null in the validated data but it should not be null
        $validated =  array_filter($validated, function ($value, $key) {
            if ($key == 'name' || $key == 'slug') {
                return !(is_null($value) || empty($value));
            }
            return true;
        }, ARRAY_FILTER_USE_BOTH);

        if (isset($validated['category_id'])) {
            $category = Category::find($validated['category_id']);
            $product->category()->associate($category);
        }else{
            $product->category()->disassociate();
        }

        if (isset($validated['store_id'])) {
            $store = Store::find($validated['store_id']);
            $product->store()->associate($store);
        }else{
            $product->store()->disassociate();
        }

        $product->update($validated);
        return redirect()->route(RouteServiceProvider::HOME);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
