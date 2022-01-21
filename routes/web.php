<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/product', function () {
    return view('product');
});

Route::get('/cart', function () {
    return view('cart');
})->name("cart");

Route::get('/checkout', function () {
    return view('checkout');
})->name("checkout");

Route::get('/order-complete', function () {
    return view('order-complete');
})->name("order-complete");

Route::get('/products', function () {
    return view('products');
})->name("products");

Route::get('/signin', function () {
    return view('signup');
})->name("signin");

Route::get('/about', function () {
    return view('about-us');
})->name("about");

Route::get('/contact', function () {
    return view('contact-us');
})->name("contact");

Route::get('/account', function () {
    return view('account');
})->name("account");

Route::get('/coming-soon', function () {
    return view('welcome');
})->name("coming-soon");

Route::get('/login-popup', function () {
    return view('components.login-popup');
})->name("login-popup");
