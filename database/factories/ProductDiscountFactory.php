<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'discount_percent' => $this->faker->numberBetween(1, 99),
            'is_active' => true,
            'starting_at' => $this->faker->dateTimeBetween('-1 month', '+1 months'),
            'ending_at' => $this->faker->dateTimeBetween('+2 months', '+4 months'),
            'product_id' => Product::factory(),
        ];
    }
}
