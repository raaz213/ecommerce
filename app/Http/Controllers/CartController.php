<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index($id, Request $request)
    {
        $product = Product::find($id);

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        $existingCartItem = Cart::where('product_id', $product->id)->first();

        if ($existingCartItem) {
            // Product already exists in the cart
            return back()->with('message', 'Product already exists in cart.');
        }

        // Create a new cart item
        $cart = new Cart();
        $cart->stock = $request->stock;
        $cart->product_id = $product->id;
        $cart->save();

        return back()->with('message', 'Product added to cart successfully.');
    }
    public function update($id , Request $request){
        $cart = Cart::find($id);
        $cart->stock = $request->stock;
        $cart->update();

        return back()->with('message', 'Product updated to cart successfully.');

    }
    public function destroy($id){
        $cart = cart::find($id);
        $cart->delete();
        return back()->with('message', 'Product deleted  successfully.');
    }

}
