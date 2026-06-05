<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['employee_id', 'attendance_date', 'check_in_time', 'check_out_time', 'status', 'working_hours', 'overtime_minutes', 'remarks', 'created_by', 'updated_by'])]
class EmployeeAttendance extends Model
{
    use Blameable;
}
