<?php

namespace Database\Factories;
use App\Models\Category;

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
public function definition() {
    return [
        'name' => $this->faker->word(),
        'price' => $this->faker->randomFloat(2, 1, 100),
        'stock' => $this->faker->numberBetween(0, 50),
        'category_id' => Category::factory()
    ];
}
}
