<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = new Product()->getProducts();

        return response()->json([
            'message' => 'Products retrieved successfully',
            'data' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $product): JsonResponse
    {
        $product = new Product()->findProduct($product);

        if (empty($product)) {
            return response()->json(['message' => 'No Product found'], 400);
        }

        return response()->json([
            'message' => 'Product retrieved successfully',
            'data' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, int $product): JsonResponse
    {
        $product = new Product()->findProduct($product);

        if (empty($product)) {
            return response()->json(['message' => 'No Product found'], 400);
        }

        $product->update($request->validated());

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $product): JsonResponse
    {
        $product = new Product()->findProduct($product);

        if (empty($product)) {
            return response()->json(['message' => 'No Product found'], 400);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ]);
    }
}
