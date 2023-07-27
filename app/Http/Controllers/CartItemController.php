<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;

class CartItemController extends Controller
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
    public function create() ## will be removed as we don't need a form for this
    {
        $user = User::find(auth()->id());

        return Inertia::render('CartItem/Create', [
            'products' => Product::all(),
            'carts' => $user->carts()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartItemRequest $request)
    {
        $validated = $request->only(['product_id', 'cart_id']);
        $cartItem = new CartItem($request->only('quantity'));

        $product = Product::find($validated['product_id']);
        $cart = Cart::find($validated['cart_id']);

        $cartItem->product()->associate($product);
        $cart->cartItems()->save($cartItem);

        return redirect()->route(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        //
    }
}
