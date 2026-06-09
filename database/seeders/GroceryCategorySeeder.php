<?php

namespace Database\Seeders;

use App\Models\GroceryCategory;
use Illuminate\Database\Seeder;

class GroceryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroceryCategory::insert([
            [
                'name' => 'Vegetables',
                'slug' => 'vegetables',
                'code' => 'VEG',
                'description' => 'Fresh vegetables used in food preparation.',
                'is_active' => true,
                'sort_order' => 1,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'name' => 'Meat',
                'slug' => 'meat',
                'code' => 'MEAT',
                'description' => 'Chicken, beef, lamb and other meat products.',
                'is_active' => true,
                'sort_order' => 2,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'name' => 'Seafood',
                'slug' => 'seafood',
                'code' => 'SEA',
                'description' => 'Fish, shrimp and other seafood ingredients.',
                'is_active' => true,
                'sort_order' => 3,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'name' => 'Rice & Grains',
                'slug' => 'rice-grains',
                'code' => 'RICE',
                'description' => 'Rice, flour and grain-based ingredients.',
                'is_active' => true,
                'sort_order' => 4,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'name' => 'Dairy Products',
                'slug' => 'dairy-products',
                'code' => 'DAIRY',
                'description' => 'Milk, butter, cheese and cream.',
                'is_active' => true,
                'sort_order' => 5,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'name' => 'Spices',
                'slug' => 'spices',
                'code' => 'SPICE',
                'description' => 'Dry spices and seasoning materials.',
                'is_active' => true,
                'sort_order' => 6,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'name' => 'Oil & Fats',
                'slug' => 'oil-fats',
                'code' => 'OIL',
                'description' => 'Cooking oils and fat products.',
                'is_active' => true,
                'sort_order' => 7,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'name' => 'Frozen Foods',
                'slug' => 'frozen-foods',
                'code' => 'FRZ',
                'description' => 'Frozen ingredients and products.',
                'is_active' => true,
                'sort_order' => 8,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'name' => 'Bakery Ingredients',
                'slug' => 'bakery-ingredients',
                'code' => 'BAKE',
                'description' => 'Ingredients used for bakery products.',
                'is_active' => true,
                'sort_order' => 9,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'name' => 'Beverages',
                'slug' => 'beverages',
                'code' => 'BEV',
                'description' => 'Tea, coffee, juices and other drinks.',
                'is_active' => true,
                'sort_order' => 10,
                'image' => null,
                'created_by' => 1,
            ],
        ]);
    }
}
