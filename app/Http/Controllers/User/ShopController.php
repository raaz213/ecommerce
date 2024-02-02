<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $categories = Category::latest()->with('subcategory')->get();
        $products = Product::latest()->paginate(4);
        return view('user.shop', compact('categories', 'products'));
    }
   
    public function filterByCategory($categorySlug)
    {
        $categories = Category::latest()->get();
        if (Category::where('slug', $categorySlug)->exists()) {
            $category = Category::where('slug', $categorySlug)->first();
            $products = Product::whereHas('subcategory', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })->paginate(6);
    
            return view('user.category', compact('categories','products'));
        }
    }
    
    public function filterBySubcategory($categorySlug, $subcategorySlug)
    {
        $categories = Category::latest()->get();
        if (Category::where('slug', $categorySlug)->exists()) {
            $category = Category::where('slug', $categorySlug)->first();
    
            if ($subcategorySlug) {
                $subcategory = $category->subcategory()->where('slug', $subcategorySlug)->first();
                $products = Product::where('sub_category_id', $subcategory->id)->paginate(6);
    
                return view('user.category', compact('categories','products'));
            }
        }
    
    }
    
        
    }
    

