<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => str_pad(fake()->numberBetween(0, 100000), 6, '0', STR_PAD_LEFT),
            'name' => fake()->unique()->safeEmail(),
            'category' => fake()->randomElement(['insurance', 'vehicle']),
            'price' => fake()->numberBetween(0, 100000),
            'discount_percentage' => fake()->randomElement([null, fake()->numberBetween(1, 99)]),
        ];
    }
}
