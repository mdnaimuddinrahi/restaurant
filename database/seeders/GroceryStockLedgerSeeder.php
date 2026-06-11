<?php

namespace Database\Seeders;

use App\Models\GroceryStockLedger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroceryStockLedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroceryStockLedger::insert([
            [
                'grocery_id' => 1,
                'reference_type' => 'purchase',
                'reference_id' => 1,
                'transaction_type' => 1,
                'quantity' => 50,
                'unit_price' => 320,
                'total_amount' => 16000,
                'balance_before' => 0,
                'balance_after' => 50,
                'transaction_date' => now(),
                'created_by' => 1,
            ],
            [
                'grocery_id' => 1,
                'reference_type' => 'sale',
                'reference_id' => 10,
                'transaction_type' => 2,
                'quantity' => 8,
                'unit_price' => 320,
                'total_amount' => 2560,
                'balance_before' => 50,
                'balance_after' => 42,
                'transaction_date' => now(),
                'created_by' => 1,
            ],
        ]);
    }
}
