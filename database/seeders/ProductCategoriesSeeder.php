<?php

namespace Database\Seeders;

use App\Models\ProductCategories;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategories::insert([
            [   
                'name' => 'Appetizers',
                'slug' => 'appetizers',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Main Course',
                'slug' => 'main-course',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Rice Dishes',
                'slug' => 'rice-dishes',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Noodles & Pasta',
                'slug' => 'noodles-pasta',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Pizza',
                'slug' => 'pizza',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Burger & Sandwiches',
                'slug' => 'burger-sandwiches',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Seafood',
                'slug' => 'seafood',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Chicken Special',
                'slug' => 'chicken-special',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Beef Special',
                'slug' => 'beef-special',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Vegetarian',
                'slug' => 'vegetarian',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Soups',
                'slug' => 'soups',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Salads',
                'slug' => 'salads',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Desserts',
                'slug' => 'desserts',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Ice Cream',
                'slug' => 'ice-cream',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Hot Beverages',
                'slug' => 'hot-beverages',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Cold Beverages',
                'slug' => 'cold-beverages',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Fresh Juice',
                'slug' => 'fresh-juice',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Mocktails',
                'slug' => 'mocktails',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Kids Menu',
                'slug' => 'kids-menu',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Combo Meals',
                'slug' => 'combo-meals',
                'status' => 1,
                'created_by' => 1,
            ],
        ]);
    }
}
