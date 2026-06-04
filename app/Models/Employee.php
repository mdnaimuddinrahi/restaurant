<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_type_id',
    'employee_designation_id',
    'user_id',
    'name',
    'email',
    'phone',
    'address',
    'date_of_birth',
    'date_of_joining',
    'is_active',
    'gender',
    'profile_img',
    'national_id',
    'passport_number',
    'emergency_contact_name',
    'emergency_contact_phone',
    'emergency_contact_relation',
    'documents',
    'basic_salary',
    'termination_date',
    'blood_group',
    'marital_status',
    'shift_start',
    'shift_end',
    'created_by',
    'updated_by',
])]
class Employee extends Model
{
    //
}
