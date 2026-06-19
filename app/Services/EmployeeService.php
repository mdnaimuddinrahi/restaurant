<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\EmployeeDesignation;
use App\Models\EmployeeType;
use App\Utils\Helpers;

class EmployeeService
{
    public function resource(): array
    {
        $data = [
            'genders' => Helpers::makeArrayPairs(Employee::genderList()),
            'marital_status' => Helpers::makeArrayPairs(Employee::maritalStatusList()),
            'blood_groups' => Helpers::makeArrayPairs(Employee::bloodGroupList()),
        ];
        $data['employee_types'] = new EmployeeType()->getEmployeeTypes([
            'selected_columns' => ['id as value', 'name as label', 'code'],
            'is_active' => true,
        ]);
        $data['employee_designations'] = new EmployeeDesignation()->getEmployeeDesignations([
            'selected_columns' => ['id as value','name as label'],
            'is_active' => true,
        ]);
       

        return $data;
    }

    public function getEmployeeList(array $filter): array
    {
        return Helpers::safeCall(function () use ($filter) {
            $filter = Helpers::addPaginate($filter);
            $employees = new Employee()->getEmployees($filter)->toArray();
            
            return Helpers::addPaginationHeader($employees);   
        });     
    }
}
