<?php

namespace Database\Seeders;

use App\Models\EmployeeAttendance;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmployeeAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($day = 0; $day < 20; $day++) {

            $date = Carbon::today()->subDays($day);

            foreach ([1, 2, 3, 4, 5] as $employeeId) {

                $checkIn = Carbon::parse($date->format('Y-m-d') . ' 09:00:00');
                $checkOut = Carbon::parse($date->format('Y-m-d') . ' 17:00:00');

                $data[] = [
                    'employee_id' => $employeeId,
                    'attendance_date' => $date->format('Y-m-d'),
                    'check_in_time' => $checkIn->format('H:i:s'),
                    'check_out_time' => $checkOut->format('H:i:s'),

                    // 0 absent
                    // 1 present
                    // 2 late
                    // 3 half day
                    'status' => 1,

                    'working_hours' => rand(8, 12),
                    'overtime_minutes' => rand(20, 540),
                    'remarks' => null,
                    'created_by' => 1,
                ];
            }
        }

        EmployeeAttendance::insert($data);
    }
}
