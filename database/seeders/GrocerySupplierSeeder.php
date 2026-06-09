<?php

namespace Database\Seeders;

use App\Models\GrocerySupplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrocerySupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GrocerySupplier::insert([
            [
                'name' => 'Fresh Farm Foods',
                'code' => 'SUP-001',
                'contact_person' => 'John Smith',
                'phone' => '+1-555-1001',
                'email' => 'contact@freshfarmfoods.com',
                'country' => 'USA',
                'opening_balance' => 0,
                'is_active' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Ocean Seafood Supply',
                'code' => 'SUP-002',
                'contact_person' => 'David Miller',
                'phone' => '+1-555-1002',
                'email' => 'sales@oceanseafood.com',
                'country' => 'USA',
                'opening_balance' => 5000,
                'is_active' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Green Valley Vegetables',
                'code' => 'SUP-003',
                'contact_person' => 'Emma Wilson',
                'phone' => '+44-777-1003',
                'email' => 'info@greenvalley.com',
                'country' => 'UK',
                'opening_balance' => 0,
                'is_active' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Prime Meat Traders',
                'code' => 'SUP-004',
                'contact_person' => 'Michael Brown',
                'phone' => '+61-777-1004',
                'email' => 'support@primemeat.com',
                'country' => 'Australia',
                'opening_balance' => 1200,
                'is_active' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Golden Grain Suppliers',
                'code' => 'SUP-005',
                'contact_person' => 'Sophia Taylor',
                'phone' => '+91-888-1005',
                'email' => 'sales@goldengrain.com',
                'country' => 'India',
                'opening_balance' => 0,
                'is_active' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Sunrise Dairy Products',
                'code' => 'SUP-006',
                'contact_person' => 'Olivia White',
                'phone' => '+1-555-1006',
                'email' => 'contact@sunrisedairy.com',
                'country' => 'Canada',
                'opening_balance' => 0,
                'is_active' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Global Spice House',
                'code' => 'SUP-007',
                'contact_person' => 'James Anderson',
                'phone' => '+971-50-1007',
                'email' => 'info@globalspice.com',
                'country' => 'UAE',
                'opening_balance' => 3000,
                'is_active' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Pure Oil Distributors',
                'code' => 'SUP-008',
                'contact_person' => 'Daniel Thomas',
                'phone' => '+65-777-1008',
                'email' => 'sales@pureoil.com',
                'country' => 'Singapore',
                'opening_balance' => 0,
                'is_active' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Harvest Produce Ltd.',
                'code' => 'SUP-009',
                'contact_person' => 'Emily Davis',
                'phone' => '+49-777-1009',
                'email' => 'contact@harvestproduce.com',
                'country' => 'Germany',
                'opening_balance' => 0,
                'is_active' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Metro Wholesale Foods',
                'code' => 'SUP-010',
                'contact_person' => 'Robert Johnson',
                'phone' => '+81-777-1010',
                'email' => 'sales@metrowholesale.com',
                'country' => 'Japan',
                'opening_balance' => 2500,
                'is_active' => true,
                'created_by' => 1,
            ],
        ]);
    }
}
