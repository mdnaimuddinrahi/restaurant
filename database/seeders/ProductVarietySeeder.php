<?php

namespace Database\Seeders;

use App\Models\ProductVariety;
use Illuminate\Database\Seeder;

class ProductVarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductVariety::insert([
            [
                'name' => 'Regular',
                'slug' => 'regular',
                'category_id' => null,
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Large',
                'slug' => 'large',
                'category_id' => null,
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Extra Large',
                'slug' => 'extra-large',
                'category_id' => null,
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Small',
                'slug' => 'small',
                'category_id' => null,
                'status' => 1,
                'created_by' => 1,
            ],
        ]);
    }
}
