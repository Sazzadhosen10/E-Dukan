<?php

use Illuminate\Support\Facades\Route;

// Shop Routes
Route::get('/', function () {
    return redirect('/shop');
});

Route::get('/shop', function () {
    return view('shop.index');
});

Route::get('/shop/category', function () {
    return view('shop.category');
});

Route::get('/shop/product', function () {
    return view('shop.product');
});

Route::get('/shop/cart', function () {
    return view('shop.cart');
});

Route::get('/shop/checkout', function () {
    return view('shop.checkout');
});

// Admin Routes
Route::get('/admin', function () {
    return redirect('/admin/categories');
});

Route::get('/admin/categories', function () {
    return view('admin.categories');
});

Route::get('/admin/products', function () {
    return view('admin.products');
});

Route::get('/admin/orders', function () {
    return view('admin.orders');
});
