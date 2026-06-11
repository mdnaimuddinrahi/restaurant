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
    Route::apiResource('/product-varieties', \App\Http\Controllers\ProductVarietyController::class);
    Route::apiResource('/products', \App\Http\Controllers\ProductController::class);
    Route::apiResource('/product-announcements', \App\Http\Controllers\ProductAnnouncementController::class);
    Route::apiResource('/product-recipes', \App\Http\Controllers\ProductRecipeController::class);
    Route::apiResource('/grocery-categories', \App\Http\Controllers\GroceryCategoryController::class);
    Route::apiResource('/grocery-units', \App\Http\Controllers\GroceryUnitController::class);
    Route::apiResource('/grocery-purchases', \App\Http\Controllers\GroceryPurchaseController::class);
    Route::apiResource('/grocery-purchase-items', \App\Http\Controllers\GroceryPurchaseItemController::class);
    Route::apiResource('/groceries', \App\Http\Controllers\GroceryController::class);
    Route::apiResource('/grocery-suppliers', \App\Http\Controllers\GrocerySupplierController::class);
    Route::apiResource('/grocery-stock-ledgers', \App\Http\Controllers\GroceryStockLedgerController::class);
    Route::apiResource('/customers', \App\Http\Controllers\CustomerController::class)->whereNumber('customer');
});

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\AuthController::class, 'store']);

Route::post('/customer-login', [App\Http\Controllers\AuthController::class, 'customerLogin']);
Route::post('/customer-register', [App\Http\Controllers\AuthController::class, 'customerStore']);
Route::get('/customer-me', [App\Http\Controllers\AuthController::class, 'customerMe'])->middleware('auth:sanctum');

Route::post('/customer-logout', [App\Http\Controllers\AuthController::class, 'customerLogout'])->middleware('auth:sanctum');
