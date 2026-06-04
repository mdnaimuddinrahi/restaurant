<?php

namespace Database\Seeders;

use App\Models\EmployeeType;
use Illuminate\Database\Seeder;

class EmployeeTypeSeeder extends Seeder
{
    public function run(): void
    {
        EmployeeType::insert([
            [
                'name' => 'Full-Time',
                'code' => 'FT',
                'description' => 'Employees who work full-time hours.',
                'is_active' => true,
                'shift_start' => '09:00:00',
                'shift_end' => '17:00:00',
                'working_hours' => 480,
                'created_by' => 1,
            ],
            [
                'name' => 'Part-Time',
                'code' => 'PT',
                'description' => 'Employees who work part-time hours.',
                'is_active' => true,
                'shift_start' => '12:00:00',
                'shift_end' => '16:00:00',
                'working_hours' => 240,
                'created_by' => 1,
            ],
            [
                'name' => 'Contractor',
                'code' => 'CTR',
                'description' => 'Employees who are hired on a contract basis.',
                'is_active' => true,
                'shift_start' => null,
                'shift_end' => null,
                'working_hours' => null,
                'created_by' => 1,
            ],
        ]);
    }
}
