<?php

namespace App\Http\Controllers;

use App\Models\CustomerInfo;
use App\Http\Requests\StoreCustomerInfoRequest;
use App\Http\Requests\UpdateCustomerInfoRequest;
use Illuminate\Http\JsonResponse;

class CustomerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = new CustomerInfo()->getCustomerInfos();

        return response()->json([
            'message' => "Customer Info list retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerInfoRequest $request): JsonResponse
    {
        $data = CustomerInfo::create($request->validated());

        return response()->json([
            'message' => "Customer Info created successfully.",
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $customerInfoId): JsonResponse
    {
        $data = new CustomerInfo()->findCustomerInfo($customerInfoId);

        if (empty($data)) {
            return response()->json(['message' => "No Customer Info found."], 400);
        }
        
        return response()->json([
            'message' => "Customer Info retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerInfoRequest $request, int $customerInfoId): JsonResponse
    {
        $customerInfoObj = new CustomerInfo()->findCustomerInfo($customerInfoId);

        if (empty($customerInfoObj)) {
            return response()->json(['message' => "No Customer Info found."], 400);
        }

        $customerInfoObj->update($request->validated());

        
        return response()->json([
            'message' => "Customer Info updated successfully.",
            'data' => $customerInfoObj->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $customerInfoId): JsonResponse
    {
        
        $customerInfoObj = new CustomerInfo()->findCustomerInfo($customerInfoId);

        if (empty($customerInfoObj)) {
            return response()->json(['message' => "No Customer Info found."], 400);
        }
        $customerInfoObj->delete();

        return response()->json([
            'message' => "Customer Info deleted successfully.",
        ]);
    }
}
