<?php

namespace App\Http\Controllers;

use App\Models\GroceryPurchase;
use App\Http\Requests\StoreGroceryPurchaseRequest;
use App\Http\Requests\UpdateGroceryPurchaseRequest;
use Illuminate\Http\JsonResponse;

class GroceryPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = new GroceryPurchase()->getGroceryPurchases();

        return response()->json([
            'message' => "Grocery Purchase list retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroceryPurchaseRequest $request): JsonResponse
    {
        $data = GroceryPurchase::create($request->validated());

        return response()->json([
            'message' => "Grocery Purchase created successfully.",
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $groceryPurchaseId): JsonResponse
    {
        $data = new GroceryPurchase()->findGroceryPurchase($groceryPurchaseId);

        if (empty($data)) {
            return response()->json(['message' => "No Grocery Purchase found."], 400);
        }
        
        return response()->json([
            'message' => "Grocery Purchase retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroceryPurchaseRequest $request, int $groceryPurchaseId): JsonResponse
    {
        $groceryPurchaseObj = new GroceryPurchase()->findGroceryPurchase($groceryPurchaseId);

        if (empty($groceryPurchaseObj)) {
            return response()->json(['message' => "No Grocery Purchase found."], 400);
        }

        $groceryPurchaseObj->update($request->validated());

        
        return response()->json([
            'message' => "Grocery Purchase updated successfully.",
            'data' => $groceryPurchaseObj->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $groceryPurchaseId): JsonResponse
    {
        
        $groceryPurchaseObj = new GroceryPurchase()->findGroceryPurchase($groceryPurchaseId);

        if (empty($groceryPurchaseObj)) {
            return response()->json(['message' => "No Grocery Purchase found."], 400);
        }
        $groceryPurchaseObj->delete();

        return response()->json([
            'message' => "Grocery Purchase deleted successfully.",
        ]);
    }
}
