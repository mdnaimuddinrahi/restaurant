<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Traits\Filterable;
use App\Traits\Paginable;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

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
    use Blameable, Paginable, Filterable, Searchable;
    
    const string WITH_EMPLOYEE_TYPE = 'employeeType';
    const string WITH_EMPLOYEE_DESIGNATION = 'employeeDesignation';
    const string WITH_USER = 'user';

    public function getEmployees(array $filter = [])
    {
        return $this->query()
                    ->withRelations($filter['with'] ?? [])
                    ->byBloodGroup($filter['blood_group'] ?? null)
                    ->byEmployeeDesignation($filter['employee_designation'] ?? null)
                    ->byEmployeeType($filter['employee_type'] ?? null)
                    ->byGender($filter['gender'] ?? null)
                    ->byMartialStatus($filter['marital_status'] ?? null)
                    ->search(
                        $filter['search_term'] ?? null,
                        $filter['search_fields'] ?? 'name,email,phone'
                    )
                    ->withRelations($filter['with'] ?? [])
                    ->getOrPaginate($filter);
    }

    public function scopeByBloodGroup(Builder $query, ?int $bloodGroup): Builder
    {
        return $query->when(
            $this->isValidFilter($bloodGroup),
            fn ($q) => $q->where('blood_group', $bloodGroup)
        );
    }

    public function scopeByEmployeeDesignation(Builder $query, ?int $employeeDesignation): Builder
    {
        return $query->when(
            $this->isValidFilter($employeeDesignation),
            fn ($q) => $q->where('employee_designation_id', $employeeDesignation)
        );
    }

    public function scopeByEmployeeType(Builder $query, ?int $employeeType): Builder
    {
        return $query->when(
            $this->isValidFilter($employeeType),
            fn ($q) => $q->where('employee_type_id', $employeeType)
        );
    }

    public function scopeByGender(Builder $query, ?int $gender): Builder
    {
        return $query->when(
            $this->isValidFilter($gender),
            fn ($q) => $q->where('gender', $gender)
        );
    }

    public function scopeByMartialStatus(Builder $query, ?string $martialStatus): Builder
    {
        return $query->when(
            $this->isValidFilter($martialStatus),
            fn ($q) => $q->where('marital_status', $martialStatus)
        );
    }
    
    public function scopeById(Builder $query, int $employeeId): Builder
    {
        return $query->where('id', $employeeId);
    }

    public function scopeWithRelations(Builder $query, array $relations = []): Builder
    {
        return $query->when(!empty($relations), function ($q) use ($relations) {
            $q->with($relations);
        });
    }

    public function findEmployee(int $employeeId): ?Model
    {
        return $this->query()
                    ->with(['employeeType', 'employeeDesignation', 'user'])
                    ->byId($employeeId)
                    ->first();
    }

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
}
