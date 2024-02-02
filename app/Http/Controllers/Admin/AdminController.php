<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function categories(){
        // $categories = Category::all();
        $categories = Category::latest()->get();
        return view('admin.categoryList',compact('categories'));
    }
    function subcategories(){
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.subcategoryList',compact('categories','subcategories'));
    }
}

