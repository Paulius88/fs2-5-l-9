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
            'category_id' => Models\Products\Category::inRandomOrder()->first()->id,
            'name' => $this->faker->words(rand(2,3), TRUE),
            'description' => $this->faker->sentence,
            'identifier' => $this->faker->ean13,
            'identifier_type_id' => Models\Products\IdentifierType::inRandomOrder()->first()->id,
            'price' => $this->faker->randomNumber(2)
        ];
    }
}
