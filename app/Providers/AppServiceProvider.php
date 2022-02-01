<?php

namespace App\Providers;

use App\Http\Controllers\CartItemController;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Pass product categories to header component
        $categories = cache()->remember("header.categories", now()->addHours(10), function () {
            return ProductCategory::all();
        });

        view()->composer('components.layout', function ($view) use ($categories) {
            if (Auth::check()) {
                $cartItemCount = CartItem::where('cart_id', function ($query) {
                    $query->select('id')->from('carts')->where('user_id', Auth::user()->id)->first();
                })->count();
            } else if (session()->has('cart')) {
                $cart = session('cart');
                $cartItemCount = count($cart->cartItems);
            } else {
                $cartItemCount = 0;
            }
            $view->with(['productCategories' => $categories, 'cartItemCount' => $cartItemCount]);
        });
    }
}
