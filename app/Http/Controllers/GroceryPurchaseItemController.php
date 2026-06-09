<?php

namespace App\Http\Controllers;

use App\Models\GroceryPurchaseItem;
use App\Http\Requests\StoreGroceryPurchaseItemRequest;
use App\Http\Requests\UpdateGroceryPurchaseItemRequest;
use Illuminate\Http\JsonResponse;

class GroceryPurchaseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = new GroceryPurchaseItem()->getGroceryPurchaseItems();

        return response()->json([
            'message' => "Grocery Purchase Item list retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroceryPurchaseItemRequest $request): JsonResponse
    {
        $data = GroceryPurchaseItem::create($request->validated());

        return response()->json([
            'message' => 'Grocery Purchase Item created successfully.',
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $groceryPurchaseItemId): JsonResponse
    {
        $data = new GroceryPurchaseItem()->findGroceryPurchaseItem($groceryPurchaseItemId);

        if (empty($data)) {
            return response()->json(['message' => 'No Grocery Purchase Item found.'], 400);
        }
        
        return response()->json([
            'message' => 'Grocery Purchase Item retrieved successfully.',
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroceryPurchaseItemRequest $request, int $groceryPurchaseItemId): JsonResponse
    {
        $groceryPurchaseItemObj = new GroceryPurchaseItem()->findGroceryPurchaseItem($groceryPurchaseItemId);

        if (empty($groceryPurchaseItemObj)) {
            return response()->json(['message' => 'No Grocery Purchase Item found.'], 400);
        }

        $groceryPurchaseItemObj->update($request->validated());

        
        return response()->json([
            'message' => 'Grocery Purchase Item updated successfully.',
            'data' => $groceryPurchaseItemObj->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $groceryPurchaseItemId): JsonResponse
    {
        
        $groceryPurchaseItemObj = new GroceryPurchaseItem()->findGroceryPurchaseItem($groceryPurchaseItemId);

        if (empty($groceryPurchaseItemObj)) {
            return response()->json(['message' => 'No Grocery Purchase Item found.'], 400);
        }
        $groceryPurchaseItemObj->delete();

        return response()->json([
            'message' => 'Grocery Purchase Item deleted successfully.',
        ]);
    }
}
