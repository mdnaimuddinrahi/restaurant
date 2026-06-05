<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $employees = new Employee()->getEmployees($request->all());

        return response()->json(['message' => 'Employees retrieved successfully', 'data' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request): JsonResponse
    {
        $employee = Employee::create($request->validated());

        return response()->json(['message' => 'Employee created successfully', 'data' => $employee], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $employeeId): JsonResponse
    {
        $employee = new Employee()->findEmployee($employeeId);

        if (empty($employee)) {
            return response()->json(['message' => 'No Employee found'], 400);
        }

        return response()->json(['message' => 'Employee retrieved successfully', 'data' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, int $employeeId): JsonResponse
    {
        $employee = new Employee()->findEmployee($employeeId);

        if (empty($employee)) {
            return response()->json(['message' => 'No Employee found'], 400);
        }
        $employee->update($request->validated());

        return response()->json(['message' => 'Employee updated successfully', 'data' => $employee]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $employeeId): JsonResponse
    {
        $employee = new Employee()->findEmployee($employeeId);

        if (empty($employee)) {
            return response()->json(['message' => 'No Employee found'], 400);
        }
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
