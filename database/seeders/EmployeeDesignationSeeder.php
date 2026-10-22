<?php

namespace Database\Seeders;

use App\Models\EmployeeDesignation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeDesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeDesignation::insert([
            [
                'name' => 'Manager',
                'description' => 'Responsible for overseeing restaurant operations and managing staff.',
                'status' => 1,
                'created_by' => 1, // Assuming the admin user has ID 1
            ],
            [
                'name' => 'Chef',
                'description' => 'In charge of food preparation and kitchen management.',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Waiter/Waitress',
                'description' => 'Responsible for taking orders and serving customers.',
                'status' => 0,
                'created_by' => 1,
            ],
            [
                'name' => 'Host/Hostess',
                'description' => 'Greets customers and manages seating arrangements.',
                'status' => 0,
                'created_by' => 1,
            ],
        ]);
    }
}
