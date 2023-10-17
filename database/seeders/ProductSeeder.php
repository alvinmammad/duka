<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create products with random categories
        foreach (range(1, 50) as $index) {
            $category = Category::inRandomOrder()->first();

            Product::create([
                'category_id' => $category->id,
                'name' => $faker->word,
                'price' => $faker->randomFloat(2, 10, 1000),
                'desc' => $faker->paragraph,
                'slug' => $faker->slug,
            ]);
        }
    }
}
