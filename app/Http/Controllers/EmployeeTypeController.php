<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use App\Http\Requests\StoreEmployeeTypeRequest;
use App\Http\Requests\UpdateEmployeeTypeRequest;
use Illuminate\Http\JsonResponse;

class EmployeeTypeController extends Controller
{
    public function index(): JsonResponse
    {
        $employeeType = new EmployeeType()->getEmployeeTypes();

        return response()->json(['message' => 'Employee Type List Successfully.', 'data' => $employeeType]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeTypeRequest $request): JsonResponse
    {
        $employeeType = EmployeeType::create($request->validated());
        
        return response()->json(['message' => 'Employee Type created successfully', 'data' => $employeeType], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $employeeTypeId): JsonResponse
    {
        $employeeType = new EmployeeType()->findEmployeeType($employeeTypeId);

        if (empty($employeeType)) {
            return response()->json(['message' => 'No Employee Type found'], 400);
        }

        return response()->json(['message' => 'Employee Type retrieved successfully', 'data' => $employeeType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeTypeRequest $request, int $employeeTypeId): JsonResponse
    {
        $employeeType = new EmployeeType()->findEmployeeType($employeeTypeId);

        if (empty($employeeType)) {
            return response()->json(['message' => 'No Employee Type found'], 400);
        }
        $employeeType->update($request->validated());

        return response()->json(['message' => 'Employee Type updated successfully', 'data' => $employeeType]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $employeeTypeId): JsonResponse
    {
        $employeeType = new EmployeeType()->findEmployeeType($employeeTypeId);

        if (empty($employeeType)) {
            return response()->json(['message' => 'No Employee Type found'], 400);
        }

        $employeeType->delete();

        return response()->json(['message' => 'Employee Type deleted successfully']);
    }
}
