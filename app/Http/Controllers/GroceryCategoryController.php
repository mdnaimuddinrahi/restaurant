<?php

namespace App\Http\Controllers;

use App\Models\GroceryCategory;
use App\Http\Requests\StoreGroceryCategoryRequest;
use App\Http\Requests\UpdateGroceryCategoryRequest;
use Illuminate\Http\JsonResponse;

class GroceryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = new GroceryCategory()->getGroceryCategories();

        return response()->json([
            'message' => "Grocery Category list retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroceryCategoryRequest $request): JsonResponse
    {
        $data = GroceryCategory::create($request->validated());

        return response()->json([
            'message' => 'Grocery Category created successfully.',
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $groceryCategoryId): JsonResponse
    {
        $data = new GroceryCategory()->findGroceryCategory($groceryCategoryId);

        if (empty($data)) {
            return response()->json(['message' => 'No Grocery Category found.'], 400);
        }
        
        return response()->json([
            'message' => 'Grocery Category retrieved successfully.',
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroceryCategoryRequest $request, int $groceryCategoryId): JsonResponse
    {
        $groceryCategoryObj = new GroceryCategory()->findGroceryCategory($groceryCategoryId);

        if (empty($groceryCategoryObj)) {
            return response()->json(['message' => 'No Grocery Category found.'], 400);
        }

        $data = $groceryCategoryObj->update($request->validated());

        
        return response()->json([
            'message' => 'Product updated successfully.',
            'data' => $data,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $groceryCategoryId): JsonResponse
    {
        
        $groceryCategoryObj = new GroceryCategory()->findGroceryCategory($groceryCategoryId);

        if (empty($groceryCategoryObj)) {
            return response()->json(['message' => 'No Grocery Category found.'], 400);
        }
        $groceryCategoryObj->delete();


        return response()->json([
            'message' => 'Grocery Category deleted successfully.',
        ]);
    }
}
