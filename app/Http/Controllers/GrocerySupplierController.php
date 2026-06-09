<?php

namespace App\Http\Controllers;

use App\Models\GrocerySupplier;
use App\Http\Requests\StoreGrocerySupplierRequest;
use App\Http\Requests\UpdateGrocerySupplierRequest;
use Illuminate\Http\JsonResponse;

class GrocerySupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = new GrocerySupplier()->getGrocerySuppliers();

        return response()->json([
            'message' => "Grocery Supplier list retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrocerySupplierRequest $request): JsonResponse
    {
        $data = GrocerySupplier::create($request->validated());

        return response()->json([
            'message' => "Grocery Supplier created successfully.",
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $grocerySupplierId): JsonResponse
    {
        $data = new GrocerySupplier()->findGrocerySupplier($grocerySupplierId);

        if (empty($data)) {
            return response()->json(['message' => "No Grocery Supplier found."], 400);
        }
        
        return response()->json([
            'message' => "Grocery Supplier retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrocerySupplierRequest $request, int $grocerySupplierId): JsonResponse
    {
        $grocerySupplierObj = new GrocerySupplier()->findGrocerySupplier($grocerySupplierId);

        if (empty($grocerySupplierObj)) {
            return response()->json(['message' => "No Grocery Supplier found."], 400);
        }

        $grocerySupplierObj->update($request->validated());

        
        return response()->json([
            'message' => "Grocery Supplier updated successfully.",
            'data' => $grocerySupplierObj->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $grocerySupplierId): JsonResponse
    {
        
        $grocerySupplierObj = new GrocerySupplier()->findGrocerySupplier($grocerySupplierId);

        if (empty($grocerySupplierObj)) {
            return response()->json(['message' => "No Grocery Supplier found."], 400);
        }
        $grocerySupplierObj->delete();

        return response()->json([
            'message' => "Grocery Supplier deleted successfully.",
        ]);
    }
}
