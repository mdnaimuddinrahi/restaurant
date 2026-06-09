<?php

namespace Database\Seeders;

use App\Models\GroceryPurchaseItem;
use Illuminate\Database\Seeder;

class GroceryPurchaseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroceryPurchaseItem::insert([
            [
                'grocery_purchase_id' => 1,
                'grocery_id' => 1,
                'grocery_unit_id' => 1,
                'quantity' => 20,
                'unit_price' => 80,
                'discount_amount' => 50,
                'tax_amount' => 20,
                'subtotal' => 1570,
                'remarks' => 'Fresh tomatoes',
                'created_by' => 1,
            ],
            [
                'grocery_purchase_id' => 1,
                'grocery_id' => 2,
                'grocery_unit_id' => 1,
                'quantity' => 10,
                'unit_price' => 350,
                'discount_amount' => 0,
                'tax_amount' => 0,
                'subtotal' => 3500,
                'remarks' => 'Chicken breast',
                'created_by' => 1,
            ],
            [
                'grocery_purchase_id' => 2,
                'grocery_id' => 3,
                'grocery_unit_id' => 2,
                'quantity' => 500,
                'unit_price' => 1.5,
                'discount_amount' => 0,
                'tax_amount' => 10,
                'subtotal' => 760,
                'remarks' => 'Green chili',
                'created_by' => 1,
            ],
            [
                'grocery_purchase_id' => 2,
                'grocery_id' => 4,
                'grocery_unit_id' => 3,
                'quantity' => 15,
                'unit_price' => 120,
                'discount_amount' => 100,
                'tax_amount' => 30,
                'subtotal' => 1730,
                'remarks' => 'Cooking oil',
                'created_by' => 1,
            ],
            [
                'grocery_purchase_id' => 3,
                'grocery_id' => 5,
                'grocery_unit_id' => 5,
                'quantity' => 60,
                'unit_price' => 12,
                'discount_amount' => 20,
                'tax_amount' => 0,
                'subtotal' => 700,
                'remarks' => 'Eggs',
                'created_by' => 1,
            ],
        ]);
    }
}
