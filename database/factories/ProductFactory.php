<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\ProductInventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraphs(2, true),
            'is_deleted' => false,
            'price' => $this->faker->randomFloat(2, 0.01, 100.0),
            'inventory_id' => ProductInventory::factory(),
            'category_id' => ProductCategory::factory(),
        ];
    }
}
