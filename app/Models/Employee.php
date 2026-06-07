<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    use Blameable;

    public static function bloodGroupList(): array 
    {
        return [
                1 => 'A+',
                2 => 'A-',
                3 => 'B+',
                4 => 'B-',
                5 => 'AB+',
                6 => 'AB-',
                7 => 'O+',
                8 => 'O-',
            ];
    }

    public static function maritalStatusList(): array
    {
        return [
            1 => 'Single',
            2 => 'Married',
            3 => 'Divorced',
            4 => 'Widowed',
        ];
    }

    public static function genderList(): array
    {
        return [
            1 => 'Male',
            2 => 'Female',
            3 => 'Other'
        ]; 
    }

    public function employeeType(): BelongsTo
    {
        return $this->belongsTo(EmployeeType::class);
    }

    public function employeeDesignation(): BelongsTo
    {
        return $this->belongsTo(EmployeeDesignation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
            'documents' => 'array',
            'is_active' => 'boolean',
            'basic_salary' => 'decimal:2',
            'date_of_birth' => 'date:Y-m-d',
            'date_of_joining' => 'date:Y-m-d',
            'termination_date' => 'date:Y-m-d',
        ];
    }

    public function getEmployees(array $filters = []): Collection
    {
        $employees = $this->query()
                          ->with(['employeeType', 'employeeDesignation', 'user']);

        // if (!empty($filters['query'])) {
        //     $employees->where('name', 'like', "%{$filters['query']}%");
        // }

        return $employees->get();
    }

    public function scopeById(Builder $query, int $employeeId): Builder
    {
        return $query->where('id', $employeeId);
    }

    public function findEmployee(int $employeeId): ?Model
    {
        return $this->query()->with(['employeeType', 'employeeDesignation', 'user'])->byId($employeeId)->first();
    }
}
