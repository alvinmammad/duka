<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Attribute;
use Faker\Factory as Faker;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $products = Product::all();
        $attributes = Attribute::all();

        foreach ($products as $product) {
            foreach ($attributes as $attribute) {
                AttributeValue::create([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'value' => $faker->word,
                ]);
            }
        }
    }
}
