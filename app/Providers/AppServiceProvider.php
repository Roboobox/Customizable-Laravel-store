<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\ProductCategory;
use App\Models\StoreSettings;
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


            $storeSettings = StoreSettings::whereIn('setting_type_id', function ($query) {
                $query->select('id')->from('store_setting_types')->whereIn('type', [
                    'phone',
                    'email',
                    'soc_facebook',
                    'soc_instagram',
                    'soc_pinterest',
                    'soc_twitter',
                    'soc_youtube',
                    'logo_file',
                ]);
            })
                ->select(['type','value'])
                ->leftJoin('store_setting_types', 'store_setting_types.id', '=', 'setting_type_id')
                ->get()
                ->keyBy('type');


            $view->with([
                'productCategories' => $categories,
                'cartItemCount' => $cartItemCount,
                'storeSettings' => $storeSettings,
            ]);
        });
    }
}
