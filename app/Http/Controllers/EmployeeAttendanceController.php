<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAttendance;
use App\Http\Requests\StoreEmployeeAttendanceRequest;
use App\Http\Requests\UpdateEmployeeAttendanceRequest;
use App\Services\EmployeeAttendanceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $data = new EmployeeAttendanceService()->getEmployeeAttendanceList($request->all());

        return response()->json($data['data'], $data['code'], $data['header'] ?? []);
    }

    public function store(StoreEmployeeAttendanceRequest $request): JsonResponse
    {
        $employeeAttendance = EmployeeAttendance::create($request->validated());

        return response()->json([
            'message' => 'Employee Attendance created successfully',
            'data' => $employeeAttendance,
        ], 201);
    }

    public function show(int $employeeAttendanceId): JsonResponse
    {
        $employeeAttendance = new EmployeeAttendance()->findEmployeeAttendance($employeeAttendanceId);

        if (empty($employeeAttendance)) {
            return response()->json(['message' => 'No Employee Attendance found'], 400);
        }

        return response()->json([
            'message' => 'Employee Attendance retrieved successfully',
            'data' => $employeeAttendance,
        ]);
    }

    public function update(UpdateEmployeeAttendanceRequest $request, int $employeeAttendanceId): JsonResponse
    {
        $employeeAttendance = new EmployeeAttendance()->findEmployeeAttendance($employeeAttendanceId);

        if (empty($employeeAttendance)) {
            return response()->json(['message' => 'No Employee Attendance found'], 400);
        }

        $employeeAttendance->update($request->validated());

        return response()->json([
            'message' => 'Employee Attendance updated successfully',
            'data' => $employeeAttendance,
        ]);
    }

    public function destroy(int $employeeAttendanceId): JsonResponse
    {
        $employeeAttendance = new EmployeeAttendance()->findEmployeeAttendance($employeeAttendanceId);

        if (empty($employeeAttendance)) {
            return response()->json(['message' => 'No Employee Attendance found'], 400);
        }

        $employeeAttendance->delete();

        return response()->json(['message' => 'Employee Attendance deleted successfully']);
    }
}
