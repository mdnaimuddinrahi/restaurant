<?php

namespace App\Services;

use App\Models\EmployeeAttendance;
use App\Utils\Helpers;

class EmployeeAttendanceService
{
    public function getEmployeeAttendanceList(array $filter): array
    {
        return Helpers::safeCall(function () use ($filter) {
            $filter = Helpers::addPaginate($filter);
            $employeeAttendances = new EmployeeAttendance()->getEmployeeAttendances($filter)->toArray();

            return Helpers::addPaginationHeader(
                $employeeAttendances,
                'Employee Attendance list retrieved successfully.'
            );
        });
    }
}
