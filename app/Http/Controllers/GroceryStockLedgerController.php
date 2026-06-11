<?php

namespace App\Http\Controllers;

use App\Models\GroceryStockLedger;
use App\Http\Requests\StoreGroceryStockLedgerRequest;
use App\Http\Requests\UpdateGroceryStockLedgerRequest;
use Illuminate\Http\JsonResponse;

class GroceryStockLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = new GroceryStockLedger()->getGroceryStockLedgers();

        return response()->json([
            'message' => "Grocery Stock Ledger list retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroceryStockLedgerRequest $request): JsonResponse
    {
        $data = GroceryStockLedger::create($request->validated());

        return response()->json([
            'message' => "Grocery Stock Ledger created successfully.",
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $groceryStockLedgerId): JsonResponse
    {
        $data = new GroceryStockLedger()->findGroceryStockLedger($groceryStockLedgerId);

        if (empty($data)) {
            return response()->json(['message' => "No Grocery Stock Ledger found."], 400);
        }
        
        return response()->json([
            'message' => "Grocery Stock Ledger retrieved successfully.",
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroceryStockLedgerRequest $request, int $groceryStockLedgerId): JsonResponse
    {
        $groceryStockLedgerObj = new GroceryStockLedger()->findGroceryStockLedger($groceryStockLedgerId);

        if (empty($groceryStockLedgerObj)) {
            return response()->json(['message' => "No Grocery Stock Ledger found."], 400);
        }

        $groceryStockLedgerObj->update($request->validated());

        
        return response()->json([
            'message' => "Grocery Stock Ledger updated successfully.",
            'data' => $groceryStockLedgerObj->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $groceryStockLedgerId): JsonResponse
    {
        
        $groceryStockLedgerObj = new GroceryStockLedger()->findGroceryStockLedger($groceryStockLedgerId);

        if (empty($groceryStockLedgerObj)) {
            return response()->json(['message' => "No Grocery Stock Ledger found."], 400);
        }
        $groceryStockLedgerObj->delete();

        return response()->json([
            'message' => "Grocery Stock Ledger deleted successfully.",
        ]);
    }
}
