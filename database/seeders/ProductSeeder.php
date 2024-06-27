<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Ürün 1',
            'image' => 'https://placehold.co/479x340',
            'category_id' => 1,
            'short_text' => 'short_text',
            'price' => 10,
            'size' => 'Small',
            'color' => 'red',
            'quantity' => 5,
            'status' => '0',
            'slug' => '/urun-1',
            'content' => 'Lorem ipsum dolor sit amet.'
        ]);
    }
}
