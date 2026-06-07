<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductAnnouncementRequest;
use App\Http\Requests\UpdateProductAnnouncementRequest;
use App\Models\ProductAnnouncement;
use Illuminate\Http\JsonResponse;

class ProductAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $productAnnouncements = new ProductAnnouncement()->getProductAnnouncements();

        return response()->json([
            'message' => 'Product Announcements retrieved successfully',
            'data' => $productAnnouncements,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductAnnouncementRequest $request): JsonResponse
    {
        $productAnnouncement = ProductAnnouncement::create($request->validated());

        return response()->json([
            'message' => 'Product Announcement created successfully',
            'data' => $productAnnouncement,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $productAnnouncement): JsonResponse
    {
        $productAnnouncement = new ProductAnnouncement()->findProductAnnouncement($productAnnouncement);

        if (empty($productAnnouncement)) {
            return response()->json(['message' => 'No Product Announcement found'], 400);
        }

        return response()->json([
            'message' => 'Product Announcement retrieved successfully',
            'data' => $productAnnouncement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductAnnouncementRequest $request, int $productAnnouncement): JsonResponse
    {
        $productAnnouncement = new ProductAnnouncement()->findProductAnnouncement($productAnnouncement);

        if (empty($productAnnouncement)) {
            return response()->json(['message' => 'No Product Announcement found'], 400);
        }

        $productAnnouncement->update($request->validated());

        return response()->json([
            'message' => 'Product Announcement updated successfully',
            'data' => $productAnnouncement,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $productAnnouncement): JsonResponse
    {
        $productAnnouncement = new ProductAnnouncement()->findProductAnnouncement($productAnnouncement);

        if (empty($productAnnouncement)) {
            return response()->json(['message' => 'No Product Announcement found'], 400);
        }

        $productAnnouncement->delete();

        return response()->json([
            'message' => 'Product Announcement deleted successfully',
        ]);
    }
}
