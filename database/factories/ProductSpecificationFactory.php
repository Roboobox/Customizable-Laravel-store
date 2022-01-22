<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSpecificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => $this->faker->sentence(1),
            'data' => $this->faker->sentence(6, true),
            'product_id' => Product::factory(),
        ];
    }
}
