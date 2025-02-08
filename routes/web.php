<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;


//only for administration
Route::resource("categries",CategoryController::class);
Route::resource("products",ProductController::class);


// only for clients
Route::resource("orders",OrderController::class);
Route::get("/addtocart/{id}",[HomeController::class,"addToCart"])->name("home.addtocart");
Route::get("/checkout",[HomeController::class,"checkout"])->name("home.checkout");


// for any one
Route::get("/",[HomeController::class,"index"])->name("home.index");