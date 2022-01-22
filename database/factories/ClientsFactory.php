<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'site' => $this->faker->url(),
            'logo' => $this->faker->imageUrl()
            //'icon' => $this->faker->randomElement(['w-icon-chat', 'w-icon-money', 'w-icon-bag', 'w-icon-truck'])
        ];
    }
}
