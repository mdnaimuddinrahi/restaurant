<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRecipeRequest;
use App\Http\Requests\UpdateProductRecipeRequest;
use App\Models\ProductRecipe;
use Illuminate\Http\JsonResponse;

class ProductRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $productRecipes = new ProductRecipe()->getProductRecipes();

        return response()->json([
            'message' => 'Product Recipes retrieved successfully',
            'data' => $productRecipes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRecipeRequest $request): JsonResponse
    {
        $productRecipe = ProductRecipe::create($request->validated());

        return response()->json([
            'message' => 'Product Recipe created successfully',
            'data' => $productRecipe,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $productRecipe): JsonResponse
    {
        $productRecipe = new ProductRecipe()->findProductRecipe($productRecipe);

        if (empty($productRecipe)) {
            return response()->json(['message' => 'No Product Recipe found'], 400);
        }

        return response()->json([
            'message' => 'Product Recipe retrieved successfully',
            'data' => $productRecipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRecipeRequest $request, int $productRecipe): JsonResponse
    {
        $productRecipe = new ProductRecipe()->findProductRecipe($productRecipe);

        if (empty($productRecipe)) {
            return response()->json(['message' => 'No Product Recipe found'], 400);
        }

        $productRecipe->update($request->validated());

        return response()->json([
            'message' => 'Product Recipe updated successfully',
            'data' => $productRecipe,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $productRecipe): JsonResponse
    {
        $productRecipe = new ProductRecipe()->findProductRecipe($productRecipe);

        if (empty($productRecipe)) {
            return response()->json(['message' => 'No Product Recipe found'], 400);
        }

        $productRecipe->delete();

        return response()->json([
            'message' => 'Product Recipe deleted successfully',
        ]);
    }
}
