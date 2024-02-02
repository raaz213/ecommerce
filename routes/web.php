<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Admin-routes

Route::get('/dashboard', function () {
    return view('admin/index');
});
// category
Route::get('/view-category',[AdminController::class,'categories']);
Route::post('/add-category',[CategoryController::class,'store']);
Route::get('/delete-category/{id}',[CategoryController::class,'destroy']);
Route::get('/edit-category/{id}',[CategoryController::class,'edit']);
Route::post('/update-category/{id}',[CategoryController::class,'update']);

// sub-category
Route::get('/view-subcategory',[AdminController::class,'subcategories']);
Route::post('/add-subcategory',[SubcategoryController::class,'store']);
Route::get('/delete-subcategory/{id}',[SubcategoryController::class,'destroy']);
Route::get('/edit-subcategory/{id}',[SubcategoryController::class,'edit']);
Route::post('/update-subcategory/{id}',[SubcategoryController::class,'update']);

// Route::get('/view-subcategory', function () {
//     return view('admin/subcategoryList');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User-routes

Route::get('/',[UserController::class,'index']);

Route::get('/shop',[ShopController::class,'index']);

// filter by category and subcategory
Route::get('/category/{categorySlug}', [ShopController::class,'filterByCategory'])->name('category.filter');
Route::get('/category/{categorySlug}/{subcategorySlug}', [ShopController::class,'filterBySubcategory'])->name('subcategory.filter');

// product details
Route::get('/product/{id}',[UserController::class,'products']);
// cart
Route::get('/cart',[UserController::class,'cart']);
Route::post('/addToCart/{id}',[CartController::class,'index']);
Route::post('/updateCart/{id}',[CartController::class,'update']);
Route::get('/deleteCart/{id}',[CartController::class,'destroy']);

