<?php

namespace Database\Seeders;

use App\Models\GroceryUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroceryUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroceryUnit::insert([
            [
                'name' => 'Kilogram',
                'short_name' => 'kg',
                'code' => 'KG',
               
                'created_by' => 1,
            ],
            [
                'name' => 'Gram',
                'short_name' => 'g',
                'code' => 'G',
               
                'created_by' => 1,
            ],
            [
                'name' => 'Liter',
                'short_name' => 'l',
                'code' => 'LTR',
               
                'created_by' => 1,
            ],
            [
                'name' => 'Milliliter',
                'short_name' => 'ml',
                'code' => 'ML',
               
                'created_by' => 1,
            ],
            [
                'name' => 'Piece',
                'short_name' => 'pcs',
                'code' => 'PCS',
               
                'created_by' => 1,
            ],
            [
                'name' => 'Packet',
                'short_name' => 'pkt',
                'code' => 'PKT',
                'created_by' => 1,
            ],
            [
                'name' => 'Bottle',
                'short_name' => 'btl',
                'code' => 'BTL',
               
                'created_by' => 1,
            ],
            [
                'name' => 'Box',
                'short_name' => 'box',
                'code' => 'BOX',
               
                'created_by' => 1,
            ],
            [
                'name' => 'Can',
                'short_name' => 'can',
                'code' => 'CAN',
               
                'created_by' => 1,
            ],
            [
                'name' => 'Dozen',
                'short_name' => 'doz',
                'code' => 'DOZ',
               
                'created_by' => 1,
            ],
        ]);
    }
}
