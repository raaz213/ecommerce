<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        $featuredProducts = Product::where('featured', true)->latest()->take(8)->get();
        return view('user.index', compact('products', 'featuredProducts'));
    }
    public function products($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $subcategoryId = $product->sub_category_id;
        $relatedProducts = Product::where('sub_category_id', $subcategoryId)->latest()->get();
        return view('user.product', compact('product', 'relatedProducts'));
    }
    public function cart(){
        $carts = Cart::latest()->get();
        return view('user.cart',compact('carts'));
    }

}
