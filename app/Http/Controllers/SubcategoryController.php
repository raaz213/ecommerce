<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SubcategoryController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($subcategory->name);
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
        return back()->with('message', 'subcategory added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('admin.subcategoryEdit',compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($subcategory->name);
        $subcategory->update();
        return redirect('/view-subcategory')->with('message', 'subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return back()->with('message', 'subcategory deleted successfully.');
    }
}
