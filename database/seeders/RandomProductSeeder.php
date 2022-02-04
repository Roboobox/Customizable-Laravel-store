<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDiscount;
use App\Models\ProductPhoto;
use App\Models\ProductSpecification;
use App\Models\User;
use App\Models\ViewHistory;
use Illuminate\Database\Seeder;

class RandomProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create categories
        $categories = ProductCategory::factory(5)->create();

        // Create products with previously created category picked at random
        $products = [];
        for ($i = 0; $i < 20; $i++) {
            $products[] = Product::factory()->create(['category_id' => $categories->random()]);
        }
        $products = collect($products);

        // Create specifications and photo for each product
        $products->each(function ($product) use ($products) {
            ProductSpecification::factory(5)->create(['product_id' => $product->id]);
            ProductPhoto::factory()->create(['product_id' => $product->id]);
        });

        // Create discounts
        ProductDiscount::factory()->create(['product_id' => $products->random()]);
        ProductDiscount::factory()->create(['product_id' => $products->random()]);

        // Create view history
        for ($i = 0; $i < 10; $i++) {
            ViewHistory::factory()->create(['product_id' => $products->random(), 'user_id' => $user->id]);
        }
         User::factory(10)->create();
    }
}
