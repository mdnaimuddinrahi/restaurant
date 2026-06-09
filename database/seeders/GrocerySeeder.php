<?php

namespace Database\Seeders;

use App\Models\Grocery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GrocerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groceries = [
            ['Chicken Breast', 1, 1, 350],
            ['Beef', 1, 1, 650],
            ['Rice', 2, 1, 70],
            ['Basmati Rice', 2, 1, 120],
            ['Tomato', 3, 1, 80],
            ['Onion', 3, 1, 60],
            ['Potato', 3, 1, 50],
            ['Carrot', 3, 1, 90],
            ['Green Chili', 3, 1, 150],
            ['Garlic', 3, 1, 200],
            ['Ginger', 3, 1, 180],
            ['Cooking Oil', 4, 2, 180],
            ['Olive Oil', 4, 2, 850],
            ['Egg', 5, 3, 12],
            ['Milk', 5, 2, 90],
            ['Cheese', 5, 1, 650],
            ['Butter', 5, 1, 500],
            ['Salt', 6, 1, 40],
            ['Black Pepper', 6, 1, 700],
            ['Sugar', 6, 1, 110],
        ];

        $data = [];

        foreach ($groceries as $index => [$name, $categoryId, $unitId, $price]) {

            $data[] = [
                'name' => $name,
                'slug' => Str::slug($name),

                'grocery_category_id' => $categoryId,
                'grocery_unit_id' => $unitId,

                'sku' => 'GR-' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),

                'barcode' => null,

                'current_stock' => rand(10, 200),
                'minimum_stock' => rand(5, 20),
                'reorder_quantity' => rand(10, 50),

                'purchase_price' => $price,
                'average_cost' => $price,

                'is_active' => true,

                'image' => null,

                'description' => "Fresh {$name} for restaurant inventory.",

                'created_by' => 1,
                'updated_by' => null,
            ];
        }

        Grocery::insert($data);   
    }
}
