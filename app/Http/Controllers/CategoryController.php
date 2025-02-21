<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCat = Category::paginate(15);
        return view("categories.index", ["cat" => $allCat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // Ensure the file is an image and not larger than 2MB
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $newCat = new Category();
        $newCat->name = $request->input("name");

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $newCat->image = $path;
        }

        $newCat->save();

        return redirect()->route("categories.index")->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("categories.show", ["category" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("categories.edit", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Ensure the file is an image and not larger than 2MB
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $category->name = $request->input("name");

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $path = $request->file('image')->store('categories', 'public');
            $category->image = $path;
        }

        $category->save();

        return redirect()->route("categories.index")->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route("categories.index")->with('success', 'Category deleted successfully.');
    }
}