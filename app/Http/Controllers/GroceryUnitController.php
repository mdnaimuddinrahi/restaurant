<?php

namespace App\Http\Controllers;

use App\Models\GroceryUnit;
use App\Http\Requests\StoreGroceryUnitRequest;
use App\Http\Requests\UpdateGroceryUnitRequest;
use Illuminate\Http\JsonResponse;

class GroceryUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = new GroceryUnit()->getGroceryUnits();

        return response()->json([
            'message' => "Grocery Unit list retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroceryUnitRequest $request): JsonResponse
    {
        $data = GroceryUnit::create($request->validated());

        return response()->json([
            'message' => 'Grocery Unit created successfully.',
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $groceryUnitId): JsonResponse
    {
        $data = new GroceryUnit()->findGroceryUnit($groceryUnitId);

        if (empty($data)) {
            return response()->json(['message' => 'No Grocery Unit found.'], 400);
        }
        
        return response()->json([
            'message' => 'Grocery Unit retrieved successfully.',
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroceryUnitRequest $request, int $groceryUnitId): JsonResponse
    {
        $groceryUnitObj = new GroceryUnit()->findGroceryUnit($groceryUnitId);

        if (empty($groceryUnitObj)) {
            return response()->json(['message' => 'No Grocery Unit found.'], 400);
        }

        $groceryUnitObj->update($request->validated());

        
        return response()->json([
            'message' => 'GroceryUnit updated successfully.',
            'data' => $groceryUnitObj->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $groceryUnitId): JsonResponse
    {
        
        $groceryUnitObj = new GroceryUnit()->findGroceryUnit($groceryUnitId);

        if (empty($groceryUnitObj)) {
            return response()->json(['message' => 'No Grocery Unit found.'], 400);
        }
        $groceryUnitObj->delete();

        return response()->json([
            'message' => 'Grocery Unit deleted successfully.',
        ]);
    }
}
