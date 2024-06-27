<?php

namespace Database\Seeders;

use App\Models\Catagory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // for men
        $men =  Catagory::create([
            "image" => "https://placehold.co/900x1182",
            "thumbail" => "https://placehold.co/900x1182",
            "name" => "Men",
            "content" => "lorem ipsum dolor sit amet.",
            "child_category" => 0,
            "status" => 1
        ]);

        Catagory::create([
            "image" => "https://placehold.co/900x1182",
            "thumbail" => "https://placehold.co/900x1182",
            "name" => "Sweater",
            "content" => "lorem ipsum dolor sit amet.",
            "child_category" => $men->id,
            "status" => 1
        ]);

        // for women
        $women =  Catagory::create([
            "image" => "https://placehold.co/900x1182",
            "thumbail" => "https://placehold.co/900x1182",
            "name" => "Women",
            "content" => "lorem ipsum dolor sit amet.",
            "child_category" => 0,
            "status" => 1
        ]);

        Catagory::create([
            "image" => "https://placehold.co/900x1182",
            "thumbail" => "https://placehold.co/900x1182",
            "name" => "Sweater",
            "content" => "lorem ipsum dolor sit amet.",
            "child_category" => $women->id,
            "status" => 1
        ]);

        // for kid
        $kid =  Catagory::create([
            "image" => "https://placehold.co/900x1182",
            "thumbail" => "https://placehold.co/900x1182",
            "name" => "Kid",
            "content" => "lorem ipsum dolor sit amet.",
            "child_category" => 0,
            "status" => 1
        ]);

        Catagory::create([
            "image" => "https://placehold.co/900x1182",
            "thumbail" => "https://placehold.co/900x1182",
            "name" => "Sweater",
            "content" => "lorem ipsum dolor sit amet.",
            "child_category" => $kid->id,
            "status" => 1
        ]);
    }
}
