<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');

// Password Reset Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Protected Routes (Require Authentication)
Route::middleware(['auth.custom','ChangeLang'])->group(function () {
    // Public Routes (Accessible by anyone)
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    
    // Language switch route
    Route::get('/change-lang/{lang}', [LanguageController::class, 'changeLang'])->name('changeLang');

    // Administrative Routes (Only for Admins)
    Route::resource('categories', CategoryController::class)->names('categories'); // CRUD for Categories
    Route::resource('products', ProductController::class)->names('products'); // CRUD for Products

    // Client-Specific Routes (Only for Authenticated Users)
    Route::resource('orders', OrderController::class)->names('orders'); // CRUD for Orders
    Route::get('/addtocart/{id}', [HomeController::class, 'addToCart'])->name('home.addtocart'); // Add to Cart
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout'); // Checkout Page
});