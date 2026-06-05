<?php

namespace App\Http\Controllers;

use App\Models\ProductVariety;
use App\Http\Requests\StoreProductVarietyRequest;
use App\Http\Requests\UpdateProductVarietyRequest;
use Illuminate\Http\JsonResponse;

class ProductVarietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $productVarieties = new ProductVariety()->getProductVarieties();

        return response()->json([
            'message' => 'Product Varieties retrieved successfully',
            'data' => $productVarieties,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductVarietyRequest $request): JsonResponse
    {
        $productVariety = ProductVariety::create($request->validated());

        return response()->json([
            'message' => 'Product Variety created successfully',
            'data' => $productVariety,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $productVarietyId): JsonResponse
    {
        $productVariety = new ProductVariety()->findProductVariety($productVarietyId);

        if (empty($productVariety)) {
            return response()->json(['message' => 'No Product Variety found'], 400);
        }

        return response()->json([
            'message' => 'Product Variety retrieved successfully',
            'data' => $productVariety,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductVarietyRequest $request, int $productVarietyId): JsonResponse
    {
        $productVariety = new ProductVariety()->findProductVariety($productVarietyId);

        if (empty($productVariety)) {
            return response()->json(['message' => 'No Product Variety found'], 400);
        }

        $productVariety->update($request->validated());

        return response()->json([
            'message' => 'Product Variety updated successfully',
            'data' => $productVariety,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $productVarietyId): JsonResponse
    {
        $productVariety = new ProductVariety()->findProductVariety($productVarietyId);

        if (empty($productVariety)) {
            return response()->json(['message' => 'No Product Variety found'], 400);
        }

        $productVariety->delete();

        return response()->json([
            'message' => 'Product Variety deleted successfully',
        ]);
    }
}
