<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Photo;
use App\Models\Product;
use Faker\Factory as Faker;
class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $products = Product::all();

        foreach ($products as $product) {
            Photo::create([
                'photoable_id' => $product->id,
                'photoable_type' => Product::class,
                'file_name' =>$product->name.'png',
            ]);
        }
    }
}
