<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;

class CategoryController extends Controller
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
        return Inertia::render('Category/Create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = new Category($validated);
        
        if (isset($validated['parent_id'])) {
			$parent = Category::find($validated['parent_id']);
			$category->parent()->associate($parent);
		}

		$category->save();
		return redirect()->route(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return Inertia::render('Category/Edit', [
            'categories' => Category::all()->except($category->id),
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        
        # remove required fields which are null in the validated data but it should not be null
        $validated =  array_filter($validated, function ($value, $key) {
            if ($key == 'name' || $key == 'slug') {
                return !(is_null($value) || empty($value));
            }
            return true;
        }, ARRAY_FILTER_USE_BOTH);

        if (isset($validated['parent_id'])) {
			$parent = Category::find($validated['parent_id']);
			$category->parent()->associate($parent);
		}else{
            $category->parent()->disassociate();
        }

		$category->update($validated);
		return redirect()->route(RouteServiceProvider::HOME);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
