<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use App\Http\Requests\StoreProductCategoriesRequest;
use App\Http\Requests\UpdateProductCategoriesRequest;
use Illuminate\Http\JsonResponse;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $productCategories = new ProductCategories()->getProductCategories();

        return response()->json([
            'message' => 'Product Categories retrieved successfully',
            'data' => $productCategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoriesRequest $request): JsonResponse
    {
        $productCategory = ProductCategories::create($request->validated());

        return response()->json([
            'message' => 'Product Category created successfully',
            'data' => $productCategory,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $productCategoriesId): JsonResponse
    {
        $productCategory = new ProductCategories()->findProductCategory($productCategoriesId);

        if (empty($productCategory)) {
            return response()->json(['message' => 'No Product Category found'], 400);
        }

        return response()->json([
            'message' => 'Product Category retrieved successfully',
            'data' => $productCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoriesRequest $request, int $productCategoriesId): JsonResponse
    {
        $productCategory = new ProductCategories()->findProductCategory($productCategoriesId);

        if (empty($productCategory)) {
            return response()->json(['message' => 'No Product Category found'], 400);
        }
        
        $productCategory->update($request->validated());

        return response()->json([
            'message' => 'Product Category updated successfully',
            'data' => $productCategory,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $productCategoriesId): JsonResponse
    {
        $productCategory = new ProductCategories()->findProductCategory($productCategoriesId);

        if (empty($productCategory)) {
            return response()->json(['message' => 'No Product Category found'], 400);
        }
        $productCategory->delete();

        return response()->json([
            'message' => 'Product Category deleted successfully',
        ]);
    }
}
