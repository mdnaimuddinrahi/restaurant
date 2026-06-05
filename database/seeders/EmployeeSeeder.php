<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{

    public function run(): void
    {
        $names = [
            'John Smith', 'Emma Johnson', 'Michael Brown', 'Sophia Davis',
            'James Wilson', 'Olivia Taylor', 'William Anderson', 'Ava Thomas',
            'David Martinez', 'Isabella Garcia', 'Daniel Lee', 'Mia Harris',
            'Matthew Clark', 'Amelia Lewis', 'Joseph Walker', 'Charlotte Hall',
            'Andrew Allen', 'Harper Young', 'Joshua King', 'Evelyn Scott',
        ];

        $data = [];

        foreach ($names as $index => $name) {

            $id = $index + 1;

            $data[] = [
                'employee_type_id' => rand(1, 3),
                'employee_designation_id' => rand(1, 3),
                'user_id' => null,

                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@example.com',
                'phone' => '100000000' . $id,

                'address' => 'Global Office Location ' . $id,

                'date_of_birth' => now()->subYears(rand(22, 40))->format('Y-m-d'),
                'date_of_joining' => now()->subDays(rand(10, 1000))->format('Y-m-d'),

                'is_active' => true,
                'gender' => rand(1, 3),

                'profile_img' => null,

                'national_id' => 'NID-G-' . str_pad($id, 5, '0', STR_PAD_LEFT),
                'passport_number' => 'PPT-G-' . str_pad($id, 5, '0', STR_PAD_LEFT),

                'emergency_contact_name' => 'Emergency Contact ' . $id,
                'emergency_contact_phone' => '900000000' . $id,
                'emergency_contact_relation' => 'Family',

                'documents' => json_encode([]),

                'basic_salary' => rand(15000, 50000),
                'termination_date' => null,

                'blood_group' => rand(1, 8),
                'marital_status' => rand(1, 4),

                'shift_start' => '09:00:00',
                'shift_end' => '17:00:00',
                'created_by' => 1,
            ];
        }

        Employee::insert($data);
    }
}
