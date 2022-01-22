<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo_path' => $this->faker->imageUrl(540, 480, 'technics'),
            //'photo_path' => $this->faker->image(public_path('/images'), 640, 480, 'technics', false),
            'product_id' => Product::factory(),
        ];
    }
}
