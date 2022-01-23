<?php

namespace App\Providers;

use App\Models\ProductCategory;
use Illuminate\Pagination\Paginator;
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
        view()->composer('components.header', function ($view) use ($categories) {
            $view->with('productCategories', $categories);
        });
    }
}
