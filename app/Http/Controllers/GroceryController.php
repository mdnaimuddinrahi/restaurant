<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use App\Http\Requests\StoreGroceryRequest;
use App\Http\Requests\UpdateGroceryRequest;

class GroceryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroceryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Grocery $grocery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroceryRequest $request, Grocery $grocery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grocery $grocery)
    {
        //
    }
}
