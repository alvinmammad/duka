<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductStock;
use App\Models\Product;
use App\Models\AttributeValue;
use Faker\Factory as Faker;

class ProductStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $products = Product::all();
        $attributeValues = AttributeValue::all();

        foreach ($products as $product) {
            foreach ($attributeValues as $attributeValue) {
                ProductStock::create([
                    'product_id' => $product->id,
                    'attribute_value_id' => $attributeValue->id,
                    'stock_quantity' => $faker->numberBetween(1, 100),
                ]);
            }
        }
    }
}
