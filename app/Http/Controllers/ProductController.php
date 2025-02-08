<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alProducts= Product::paginate(15);
        
        return view("products.index",["product"=>$alProducts]);
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $allCat=Category::all();
        return view("products.create",["categories"=>$allCat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $newProduct = new Product();
        $newProduct->name = $request->input("name");
        $newProduct->description = $request->input("description");
        $newProduct->category_id = intval($request->input("category_id"));
        $path = $request->file('image')->store('products', 'public');
        $newProduct->image=$path;
        $newProduct->save();
        return redirect()->route("home.index");
  
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
