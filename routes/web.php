<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Redirect root to shop
Route::get('/', function () {
    return redirect('/shop');
});

// Authentication Routes (provided by Breeze)
require __DIR__ . '/auth.php';

// Shop Routes (Public)
Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/category/{categoryId?}', [ShopController::class, 'category'])->name('shop.category');
    Route::get('/product/{id}', [ShopController::class, 'product'])->name('shop.product');
    Route::get('/search', [ShopController::class, 'search'])->name('shop.search');

    // Cart and Checkout (requires authentication)
    Route::middleware('auth')->group(function () {
        Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
        Route::get('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
        Route::get('/profile', [ShopController::class, 'profile'])->name('shop.profile');
    });
});

// User Profile Routes (provided by Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes (requires admin authentication)
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');

    // Category Management
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::put('/categories/{category}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');

    // Product Management
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/products/{product}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');

    // Orders
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
});

// Admin Login (separate from regular login)
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');
