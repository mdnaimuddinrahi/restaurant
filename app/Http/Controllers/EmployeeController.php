<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Services\EmployeeService;
use App\Services\FileUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function resource(): JsonResponse
    {
        $data = new EmployeeService()->resource();

        return response()->json([
            'message' => 'Employee Resource Data Fetch Successfully.', 
            'data' => $data
        ]);
    }
   
    public function index(Request $request): JsonResponse
    {
        $data = new EmployeeService()->getEmployeeList($request->all());

        return response()->json($data['data'], $data['code'], $data['header'] ?? []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreEmployeeRequest $request,
        FileUploadService $uploadService
    ): JsonResponse {

        $employee = DB::transaction(function () use ($request, $uploadService) {

            $data = $request->safe()->except([
                'profile_img',
                'resume',
                'documents',
            ]);

            $employee = Employee::create($data);

            $this->uploadEmployeeFiles(
                $employee,
                $request,
                $uploadService
            );

            return $employee;
        });

        return response()->json([
            'message' => 'Employee created successfully',
            'data' => $employee,
        ], 201);
    }

    private function uploadEmployeeFiles(
        Employee $employee,
        StoreEmployeeRequest $request,
        FileUploadService $uploadService
    ): void {

        $profile = $this->uploadSingle(
            $request,
            'profile_img',
            'employees/' . $employee->id . '/profile',
            $uploadService
        );

        if ($profile) {
            $employee->profile_img = $profile;
        }

        $resume = $this->uploadSingle(
            $request,
            'resume',
            'employees/' . $employee->id . '/resume',
            $uploadService
        );

        if ($resume) {
            $employee->resume = $resume;
        }

        $documents = $this->uploadMultiple(
            $request,
            'documents',
            'employees/' . $employee->id . '/documents',
            $uploadService
        );

        if ($documents) {
            $employee->documents = $documents;
        }

        $employee->save();
    }

    private function uploadSingle(
        Request $request,
        string $field,
        string $directory,
        FileUploadService $service
    ): ?string {

        if (! $request->hasFile($field)) {
            return null;
        }

        $upload = $service->upload(
            $request->file($field)[0],
            $directory
        );

        return $upload['path'];
    }

    private function uploadMultiple(
        Request $request,
        string $field,
        string $directory,
        FileUploadService $service
    ): array {

        if (! $request->hasFile($field)) {
            return [];
        }

        return collect($request->file($field))
            ->map(fn ($file) => $service->upload(
                $file, 
                $directory,
                useOriginalFileName: true
                )['path'])
            ->values()
            ->all();
    }

    public function fullMessage(\Throwable $throwable, $should_trace = false, $should_get_the_exception_code = false, $values_to_be_hidden = []): string
    {
        $full_message = $throwable->getMessage() . " at line " . $throwable->getLine() . " in " . $throwable->getFile();

        if ($should_get_the_exception_code) {
            $code = $throwable->getCode();
            $full_message .= " code: " . $code;
        }

        if ($should_trace) {
            $trace = $throwable->getTraceAsString();
            $full_message .= " trace: " . $trace;
        }

        // if (!empty($values_to_be_hidden)) {
        //     $full_message = InformationMasking::hideValues($full_message, $values_to_be_hidden);
        // }

        return $full_message;

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
    public function update(
        UpdateEmployeeRequest $request, 
        int $employeeId,
        FileUploadService $uploadService): JsonResponse
    {
        $employeeObj = new Employee()->findEmployee($employeeId);

        if (empty($employeeObj)) {
            return response()->json(['message' => 'No Employee found'], 400);
        }
        $employee = DB::transaction(function () use ($request, $uploadService, $employeeObj) {    
            $data = $request->safe()->except([
                'profile_img',
                'resume',
                'documents',
            ]);
            $employeeObj->update($data);

            $this->updateEmployeeFiles(
                $employeeObj,
                $request,
                $uploadService
            );

            return $employeeObj;
        });

        return response()->json([
            'message' => 'Employee updated successfully',
            'data' => $employee,
        ], 201);
        
    }

    private function updateEmployeeFiles(
        Employee $employee,
        Request $request,
        FileUploadService $uploadService
    ): void {

        // Profile Image
        if ($request->hasFile('profile_img')) {

            if (!empty($employee->profile_img)) {
                $uploadService->delete($employee->profile_img);
            }

            $employee->profile_img = $this->uploadSingle(
                $request,
                'profile_img',
                "employees/{$employee->id}/profile",
                $uploadService
            );
        }

        // Resume
        if ($request->hasFile('resume')) {

            if (!empty($employee->resume)) {
                $uploadService->delete($employee->resume);
            }

            $employee->resume = $this->uploadSingle(
                $request,
                'resume',
                "employees/{$employee->id}/resume",
                $uploadService
            );
        }

        // Documents (Replace All)
        if ($request->hasFile('documents')) {

            $uploadService->deleteMultiple($employee->documents ?? []);

            $employee->documents = $this->uploadMultiple(
                $request,
                'documents',
                "employees/{$employee->id}/documents",
                $uploadService
            );
        }

        $employee->save();
    }

    public function destroy(
        int $employeeId,
        FileUploadService $uploadService
    ): JsonResponse {

        $employee = new Employee()->findEmployee($employeeId);

        if (!$employee) {
            return response()->json([
                'message' => 'No Employee found'
            ], 404);
        }

        $this->deleteEmployeeFiles($employee, $uploadService);

        $employee->delete();

        return response()->json([
            'message' => 'Employee deleted successfully'
        ]);
    }

    private function deleteEmployeeFiles(
        Employee $employee,
        FileUploadService $uploadService
    ): void {

        $uploadService->delete($employee->profile_img);

        $uploadService->delete($employee->resume);

        $uploadService->deleteMultiple($employee->documents ?? []);

        // Optional: remove empty employee directory
        $uploadService->deleteDirectory("employees/{$employee->id}");
    }
}
