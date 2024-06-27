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
    public function definition(): array
    {
        $catagoryID = [1, 2, 3, 4, 5, 6, 7];
        $sizeList = ["Small", "Medium", "Large"];
        $colorList = ["black", "red", "yellow", "blue", "green", "purple", "brown", "grey", "orange"];
        return [

            'name' => fake()->name(),
            'image' => 'https://placehold.co/479x340',
            'category_id' => $catagoryID[random_int(0, 6)],
            'short_text' => "lorem ipsum dolor sit amet",
            'price' => random_int(10, 500),
            'size' => $sizeList[random_int(0, 2)],
            'color' => $colorList[random_int(0, 8)],
            'quantity' => random_int(0, 50),
            'status' => "1",
            'slug' => fake()->slug(),
            'content' => "lore dsadsadad"
        ];
    }
}
