<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'code', 'description', 'is_active', 'shift_start', 'shift_end', 'working_hours', 'created_by', 'updated_by'])]
class EmployeeType extends Model
{
    //
}
