<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::create(['name' => 'Admin', 'status' => 1, 'created_by' => 1]);
        \App\Models\Role::create(['name' => 'Manager', 'status' => 1, 'created_by' => 1]);
        \App\Models\Role::create(['name' => 'Employee', 'status' => 1, 'created_by' => 1]);
        \App\Models\Role::create(['name' => 'Guest', 'status' => 1, 'created_by' => 1]);
    }
}
