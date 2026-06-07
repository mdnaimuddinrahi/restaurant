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
        $products = [];

        for ($i = 1; $i <= 30; $i++) {

            $products[] = [

                'name' => "Product {$i}",
                'slug' => "product-{$i}",

                'price' => rand(100,1000),

                'category_id' => rand(1,20),

                'variety_id' => rand(1,05),

                'product_announcement_id' => null,

                'is_available' => true,

                'image' => null,

                'created_by' => 1
            ];
        }

        Product::insert($products);
    }
}
