<?php

namespace Database\Seeders;

use App\Models\ProductRecipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductRecipe::insert([
            [
                'name' => 'Classic Chicken Burger Recipe',
                'type' => 'Main Course',
                'slug' => 'classic-chicken-burger-recipe',
                'video_link' => 'https://youtube.com/watch?v=burger1',
                'image' => 'recipes/chicken-burger.jpg',
                'is_publishable' => true,
                'is_active' => true,
                'description' => 'Learn how to make a delicious homemade chicken burger with crispy chicken and fresh vegetables.',
                'meta_title' => 'Classic Chicken Burger Recipe',
                'meta_keywords' => 'burger,chicken burger,fast food',
                'meta_description' => 'Easy homemade chicken burger recipe.',
                'created_by' => 1,
            ],

            [
                'name' => 'Creamy Pasta Recipe',
                'type' => 'Main Course',
                'slug' => 'creamy-pasta-recipe',
                'video_link' => 'https://youtube.com/watch?v=pasta1',
                'image' => 'recipes/pasta.jpg',
                'is_publishable' => true,
                'is_active' => true,
                'description' => 'A rich and creamy pasta recipe that can be prepared in less than 30 minutes.',
                'meta_title' => 'Creamy Pasta Recipe',
                'meta_keywords' => 'pasta,italian food',
                'meta_description' => 'Easy creamy pasta recipe.',
                'created_by' => 1,
            ],

            [
                'name' => 'Thai Fried Rice Recipe',
                'type' => 'Main Course',
                'slug' => 'thai-fried-rice-recipe',
                'video_link' => 'https://youtube.com/watch?v=rice1',
                'image' => 'recipes/fried-rice.jpg',
                'is_publishable' => true,
                'is_active' => true,
                'description' => 'Traditional Thai fried rice recipe with vegetables and chicken.',
                'meta_title' => 'Thai Fried Rice Recipe',
                'meta_keywords' => 'fried rice,thai food',
                'meta_description' => 'Authentic Thai fried rice recipe.',
                'created_by' => 1,
            ],

            [
                'name' => 'Chocolate Lava Cake Recipe',
                'type' => 'Dessert',
                'slug' => 'chocolate-lava-cake-recipe',
                'video_link' => 'https://youtube.com/watch?v=cake1',
                'image' => 'recipes/lava-cake.jpg',
                'is_publishable' => true,
                'is_active' => true,
                'description' => 'Soft and gooey chocolate lava cake recipe perfect for dessert lovers.',
                'meta_title' => 'Chocolate Lava Cake Recipe',
                'meta_keywords' => 'cake,dessert,chocolate',
                'meta_description' => 'Easy lava cake recipe.',
                'created_by' => 1,
            ],

            [
                'name' => 'Mango Smoothie Recipe',
                'type' => 'Beverage',
                'slug' => 'mango-smoothie-recipe',
                'video_link' => 'https://youtube.com/watch?v=smoothie1',
                'image' => 'recipes/mango-smoothie.jpg',
                'is_publishable' => true,
                'is_active' => true,
                'description' => 'Refreshing mango smoothie recipe made with fresh mangoes.',
                'meta_title' => 'Mango Smoothie Recipe',
                'meta_keywords' => 'smoothie,mango,juice',
                'meta_description' => 'Healthy mango smoothie recipe.',
                'created_by' => 1,
            ]
            ]);
    }
}
