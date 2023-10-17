<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create root categories
        foreach (range(1, 10) as $index) {
            Category::create([
                'name' => $faker->word,
                'title' => $faker->sentence,
                'slug' => $faker->slug,
            ]);
        }
        // Create child categories
        foreach (Category::all() as $category) {
            foreach (range(1, 5) as $index) {
                Category::create([
                    'name' => $faker->word,
                    'title' => $faker->sentence,
                    'slug' => $faker->slug,
                    'parent_id' => $category->id,
                ]);
            }
        }
    }
}
