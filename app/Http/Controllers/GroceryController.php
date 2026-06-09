<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use App\Http\Requests\StoreGroceryRequest;
use App\Http\Requests\UpdateGroceryRequest;
use Illuminate\Http\JsonResponse;

class GroceryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = new Grocery()->getGrocerys();

        return response()->json([
            'message' => "Grocery list retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroceryRequest $request): JsonResponse
    {
        $data = Grocery::create($request->validated());

        return response()->json([
            'message' => "Grocery created successfully.",
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $groceryId): JsonResponse
    {
        $data = new Grocery()->findGrocery($groceryId);

        if (empty($data)) {
            return response()->json(['message' => "No Grocery found."], 400);
        }
        
        return response()->json([
            'message' => "Grocery retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroceryRequest $request, int $groceryId): JsonResponse
    {
        $groceryObj = new Grocery()->findGrocery($groceryId);

        if (empty($groceryObj)) {
            return response()->json(['message' => "No Grocery found."], 400);
        }

        $groceryObj->update($request->validated());

        
        return response()->json([
            'message' => "Grocery updated successfully.",
            'data' => $groceryObj->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $groceryId): JsonResponse
    {
        
        $groceryObj = new Grocery()->findGrocery($groceryId);

        if (empty($groceryObj)) {
            return response()->json(['message' => "No Grocery found."], 400);
        }
        $groceryObj->delete();

        return response()->json([
            'message' => "Grocery deleted successfully.",
        ]);
    }
}
