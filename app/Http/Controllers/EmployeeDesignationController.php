<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeDesignationRequest;
use App\Http\Requests\UpdateEmployeeDesignationRequest;
use App\Models\EmployeeDesignation;
use Illuminate\Http\JsonResponse;

class EmployeeDesignationController extends Controller
{
    public function index(): JsonResponse
    {
        $employeeDesignation = new EmployeeDesignation()->getEmployeeDesignations();

        return response()->json(['message' => 'Employee Designation List Successfully.', 'data' => $employeeDesignation]);
    }

    public function store(StoreEmployeeDesignationRequest $request): JsonResponse
    {
        $employeeDesignation = EmployeeDesignation::create($request->validated());

        return response()->json(['message' => 'Employee Designation created successfully', 'data' => $employeeDesignation], 201);
    }

    public function show(int $employeeDesignationId): JsonResponse
    {
        $employeeDesignation = new EmployeeDesignation()->findEmployeeDesignation($employeeDesignationId);

        if (empty($employeeDesignation)) {
            return response()->json(['message' => 'No Employee Designation found'], 400);
        }

        return response()->json(['message' => 'Employee Designation retrieved successfully', 'data' => $employeeDesignation]);
    }

    public function update(UpdateEmployeeDesignationRequest $request, int $employeeDesignationId): JsonResponse
    {
        $employeeDesignation = new EmployeeDesignation()->findEmployeeDesignation($employeeDesignationId);

        if (empty($employeeDesignation)) {
            return response()->json(['message' => 'No Employee Designation found'], 400);
        }

        $employeeDesignation->update($request->validated());

        return response()->json(['message' => 'Employee Designation updated successfully', 'data' => $employeeDesignation]);
    }

    public function destroy(int $employeeDesignationId): JsonResponse
    {
        $employeeDesignation = new EmployeeDesignation()->findEmployeeDesignation($employeeDesignationId);

        if (empty($employeeDesignation)) {
            return response()->json(['message' => 'No Employee Designation found'], 400);
        }

        $employeeDesignation->delete();

        return response()->json(['message' => 'Employee Designation deleted successfully']);
    }
}
