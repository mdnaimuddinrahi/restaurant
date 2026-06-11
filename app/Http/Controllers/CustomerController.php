<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = new Customer()->getCustomers();

        return response()->json([
            'message' => "Customer list retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        $data = Customer::create($request->validated());

        return response()->json([
            'message' => "Customer created successfully.",
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $customerId): JsonResponse
    {
        $data = new Customer()->findCustomer($customerId);

        if (empty($data)) {
            return response()->json(['message' => "No Customer found."], 400);
        }
        
        return response()->json([
            'message' => "Customer retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, int $customerId): JsonResponse
    {
        $customerObj = new Customer()->findCustomer($customerId);

        if (empty($customerObj)) {
            return response()->json(['message' => "No Customer found."], 400);
        }

        $customerObj->update($request->validated());

        
        return response()->json([
            'message' => "Customer updated successfully.",
            'data' => $customerObj->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $customerId): JsonResponse
    {
        
        $customerObj = new Customer()->findCustomer($customerId);

        if (empty($customerObj)) {
            return response()->json(['message' => "No Customer found."], 400);
        }
        $customerObj->delete();

        return response()->json([
            'message' => "Customer deleted successfully.",
        ]);
    }
}
