<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/me',      [App\Http\Controllers\AuthController::class, 'me']);
    Route::apiResource('/roles', \App\Http\Controllers\RoleController::class)->whereNumber('role');

    Route::get('/permissions', [\App\Http\Controllers\PermissionController::class, 'index']);
    Route::post('/permissions/assign', [\App\Http\Controllers\PermissionController::class, 'assignPermissionToRole']);

    Route::apiResource('/employees', \App\Http\Controllers\EmployeeController::class)->whereNumber('employee');
    Route::apiResource('/employee-designations', \App\Http\Controllers\EmployeeDesignationController::class);
    Route::apiResource('/employee-types', \App\Http\Controllers\EmployeeTypeController::class);
    Route::apiResource('/employee-attendances', \App\Http\Controllers\EmployeeAttendanceController::class);
    Route::apiResource('/product-categories', \App\Http\Controllers\ProductCategoriesController::class);

});

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\AuthController::class, 'store']);