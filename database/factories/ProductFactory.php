<?php

namespace Database\Factories;

use App\Models\Product;
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
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true), // Random title with 3 words
            // Directly using the Unsplash image URL, no need for lexify
            'image' => 'https://source.unsplash.com/640x480/?food', // Random food image from Unsplash
            'isVeg' => $this->faker->boolean(50), // Random boolean for veg/non-veg
            'price' => $this->faker->randomFloat(2, 10, 500), // Random price between 10 and 500
            'discount_price' => $this->faker->optional()->randomFloat(2, 5, 400), // Optional discount price
            'description' => $this->faker->optional()->sentence(10), // Optional short description
            'category_id' => Category::factory(), // Generate a related category
            'status' => $this->faker->boolean(80), // 80% chance of being active
        ];
    }
}
