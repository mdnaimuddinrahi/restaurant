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
        
    }
}
