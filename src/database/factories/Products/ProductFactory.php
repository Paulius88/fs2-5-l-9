<?php

namespace Database\Factories\Products;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products\Product>
 */
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
            'is_active' => 1,
            'stock' => rand(10, 100),
            'category_id' => Models\Products\Category::factory(),
            // 'name' => $this->faker->words(rand(2,3), TRUE),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'identifier' => $this->faker->ean13,
            'price' => $this->faker->randomNumber(2)
        ];
    }
}
