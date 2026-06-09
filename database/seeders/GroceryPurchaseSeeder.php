<?php

namespace Database\Seeders;

use App\Models\GroceryPurchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroceryPurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroceryPurchase::insert([
            [
                'purchase_no' => 'GP-000001',
                'supplier_id' => 1,
                'invoice_no' => 'INV-1001',
                'purchase_date' => '2026-06-01',
                'subtotal_amount' => 5000,
                'discount_amount' => 200,
                'tax_amount' => 100,
                'shipping_cost' => 50,
                'total_amount' => 4950,
                'paid_amount' => 4950,
                'due_amount' => 0,
                'status' => 1,
                'payment_status' => 2,
                'remarks' => 'Fully paid purchase.',
                'created_by' => 1,
            ],

            [
                'purchase_no' => 'GP-000002',
                'supplier_id' => 2,
                'invoice_no' => 'INV-1002',
                'purchase_date' => '2026-06-02',
                'subtotal_amount' => 3500,
                'discount_amount' => 0,
                'tax_amount' => 50,
                'shipping_cost' => 0,
                'total_amount' => 3550,
                'paid_amount' => 1500,
                'due_amount' => 2050,
                'status' => 2,
                'payment_status' => 1,
                'remarks' => 'Partially paid.',
                'created_by' => 1,
            ],

            [
                'purchase_no' => 'GP-000003',
                'supplier_id' => 3,
                'invoice_no' => 'INV-1003',
                'purchase_date' => '2026-06-03',
                'subtotal_amount' => 2700,
                'discount_amount' => 0,
                'tax_amount' => 0,
                'shipping_cost' => 0,
                'total_amount' => 2700,
                'paid_amount' => 0,
                'due_amount' => 2700,
                'status' => 0,
                'payment_status' => 0,
                'remarks' => 'Pending payment.',
                'created_by' => 1,
            ],

            [
                'purchase_no' => 'GP-000004',
                'supplier_id' => 1,
                'invoice_no' => 'INV-1004',
                'purchase_date' => '2026-06-04',
                'subtotal_amount' => 6000,
                'discount_amount' => 300,
                'tax_amount' => 100,
                'shipping_cost' => 100,
                'total_amount' => 5900,
                'paid_amount' => 5900,
                'due_amount' => 0,
                'status' => 1,
                'payment_status' => 2,
                'remarks' => null,
                'created_by' => 1,
            ],

            [
                'purchase_no' => 'GP-000005',
                'supplier_id' => 2,
                'invoice_no' => 'INV-1005',
                'purchase_date' => '2026-06-05',
                'subtotal_amount' => 4200,
                'discount_amount' => 100,
                'tax_amount' => 50,
                'shipping_cost' => 0,
                'total_amount' => 4150,
                'paid_amount' => 0,
                'due_amount' => 4150,
                'status' => 3,
                'payment_status' => 0,
                'remarks' => 'Cancelled purchase.',
                'created_by' => 1,
            ],
        ]);
    }
}
