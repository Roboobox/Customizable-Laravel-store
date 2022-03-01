<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;

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

Route::middleware(['guestOrVerified'])->group(function () {
    Route::get('/', [HomeController::class, 'create'])
        ->name("home");

    Route::get('/product/{product:slug}', [ProductController::class, 'show'])
        ->name('product');

    Route::get('/products', [ProductController::class, 'index'])
        ->name("products");

    Route::get('/c/{category:slug}', [ProductController::class, 'indexCategory'])
        ->name("products-category");

    Route::post('ajax/products', [ProductController::class, 'search'])
        ->name("ajax-products");

    Route::post('/cart_add', [CartItemController::class, 'store'])
        ->name("cart-add");

    Route::post('/cart_get_summary', [CartController::class, 'indexSummary'])
        ->name("cart-get-summary");

    Route::post('/cart_get', [CartController::class, 'indexCartContainer'])
        ->name("cart-get");

    Route::post('/cart_remove/{product}', [CartItemController::class, 'destroy'])
        ->name("cart-remove");

    Route::post('/cart_update/{product}', [CartItemController::class, 'update'])
        ->name("cart-update");

    Route::get('/cart', [CartController::class, 'index'])
        ->name("cart");

    Route::get('/checkout', function () {
        return view('checkout');
    })->name("checkout");

    Route::get('/order-complete', function () {
        return view('order-complete');
    })->name("order-complete");

    Route::get('/about', [AboutUsController::class, 'index'])
        ->name("about");

    Route::get('/contact', [ContactUsController::class, 'index'])
        ->name("contact");

    Route::post('/contact/message', [ContactUsController::class, 'store'])
        ->name("contact-message");

    Route::get('/coming-soon', function () {
        return view('welcome');
    })->name("coming-soon");
});

Route::get('/login-popup', function () {
    return view('components.login-popup');
})->name("auth-popup")->middleware('guest');

Route::get('/auth', [AuthenticatedSessionController::class, 'create'])
    ->name("auth")->middleware('guest');

Route::post('/newsletter-subscribe', [NewsletterController::class, 'store'])
    ->name('newsletter-subscribe');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/account', function () {
        return view('account.dashboard');
    })->name("account");

    Route::get('/account/orders', [OrderController::class, 'index'])
        ->name("orders");

    Route::get('/account/downloads', function () {
        return view('account.downloads');
    })->name("downloads");

    Route::get('/account/addresses', function () {
        return view('account.addresses');
    })->name("addresses");

    Route::get('/account/details', [AccountDetailController::class, 'create'])
        ->name("account-details");

    Route::post('/account/details', [AccountDetailController::class, 'store'])
        ->name("account-details-save");

    Route::post('/change-password', [ChangePasswordController::class, 'store'])
        ->name("change-password");
});

require __DIR__.'/auth.php';
