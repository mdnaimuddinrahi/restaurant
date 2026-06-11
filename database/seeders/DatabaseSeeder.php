<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([RoleSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([PermissionSeeder::class]);
        $this->call([PermissionRoleSeeder::class]);
        $this->call([EmployeeTypeSeeder::class]);
        $this->call([EmployeeDesignationSeeder::class]);
        $this->call([EmployeeSeeder::class]);
        $this->call([EmployeeAttendanceSeeder::class]);
        $this->call([ProductCategoriesSeeder::class]);
        $this->call([ProductVarietySeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([ProductAnnouncementSeeder::class]);
        $this->call([ProductRecipeSeeder::class]);
        $this->call([GroceryCategorySeeder::class]);
        $this->call([GroceryUnitSeeder::class]);
        $this->call([GroceryPurchaseItemSeeder::class]);
        $this->call([GroceryPurchaseSeeder::class]);
        $this->call([GrocerySeeder::class]);
        $this->call([GrocerySupplierSeeder::class]);
        $this->call([GroceryStockLedgerSeeder::class]);
        $this->call([CustomerSeeder::class]);
    }
}
