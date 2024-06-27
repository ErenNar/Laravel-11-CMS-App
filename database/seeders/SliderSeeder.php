<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Slider::create([
            "image" => "https://placehold.co/250x100",
            "name" => "Slider 1",
            "content" => "Lorem ipsum dolor sit amet",
            "link" => "/products"
        ]);
    }
}
