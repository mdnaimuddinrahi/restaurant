<?php

namespace Database\Seeders;

use App\Models\ProductAnnouncement;
use Illuminate\Database\Seeder;

class ProductAnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductAnnouncement::insert([
            [
                'name' => 'New Arrival',
                'slug' => 'new-arrival',
                'emoji' => '🆕',
                
                
                'is_active' => true,
                'description' => 'Recently added menu items.',
                'created_by' => 1,
            ],
            [
                'name' => 'Best Seller',
                'slug' => 'best-seller',
                'emoji' => '🥇',
                
                
                'is_active' => true,
                'description' => 'Most popular items among customers.',
                'created_by' => 1,
            ],
            [
                'name' => 'Chef Special',
                'slug' => 'chef-special',
                'emoji' => '👨‍🍳',
                
                
                'is_active' => true,
                'description' => 'Recommended by the chef.',
                'created_by' => 1,
            ],
            [
                'name' => 'Hot Deal',
                'slug' => 'hot-deal',
                'emoji' => '🔥',
                
                
                'is_active' => true,
                'description' => 'Special promotional offers.',
                'created_by' => 1,
            ],
            [
                'name' => 'Healthy Choice',
                'slug' => 'healthy-choice',
                'emoji' => '🥗',
                
                
                'is_active' => true,
                'description' => 'Nutritious and healthy menu items.',
                'created_by' => 1,
            ],
        ]);
    }
}
