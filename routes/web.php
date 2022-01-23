<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class, 'create'])
    ->name("home");

Route::get('/product/{product:slug}', [ProductController::class, 'show'])
    ->name('product');

Route::get('/products', [ProductController::class, 'index'])
    ->name("products");

Route::post('ajax/products', [ProductController::class, 'search'])
    ->name("ajax-products");

Route::get('/cart', function () {
    return view('cart');
})->name("cart");

Route::get('/checkout', function () {
    return view('checkout');
})->name("checkout");

Route::get('/order-complete', function () {
    return view('order-complete');
})->name("order-complete");

Route::get('/auth', function () {
    return view('auth-page');
})->name("auth")->middleware('guest');;

Route::get('/about', function () {
    return view('about-us');
})->name("about");

Route::get('/contact', function () {
    return view('contact-us');
})->name("contact");

Route::get('/account', function () {
    return view('account.dashboard');
})->name("account")->middleware('auth');

Route::get('/account/orders', function () {
    return view('account.orders');
})->name("orders")->middleware('auth');

Route::get('/account/downloads', function () {
    return view('account.downloads');
})->name("downloads")->middleware('auth');

Route::get('/account/addresses', function () {
    return view('account.addresses');
})->name("addresses")->middleware('auth');

Route::get('/account/details', function () {
    return view('account.account-details');
})->name("account-details")->middleware('auth');

Route::post('/account/details', [AccountDetailController::class, 'store'])
    ->name("account-details")
    ->middleware('auth');

Route::post('/change-password', [ChangePasswordController::class, 'store'])
    ->name("change-password")
    ->middleware('auth');

Route::get('/coming-soon', function () {
    return view('welcome');
})->name("coming-soon");

Route::get('/login-popup', function () {
    return view('components.login-popup');
})->name("auth-popup")->middleware('guest');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// TODO : Remove
Route::get('/test', [ProductController::class, 'test'])
    ->name("test");

require __DIR__.'/auth.php';
