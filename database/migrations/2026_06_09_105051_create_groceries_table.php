<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groceries', function (Blueprint $table) {
            $table->id();

            // Basic information
            $table->string('name', 255)->unique();
            $table->string('slug', 255)->unique();

            // Classification
            $table->unsignedBigInteger('grocery_category_id');
            $table->unsignedBigInteger('grocery_unit_id');

            // Internal code
            $table->string('sku', 100)->nullable()->unique();

            // Optional barcode
            $table->string('barcode', 100)->nullable()->unique();

            // Current stock quantity
            $table->decimal('current_stock', 14, 3)->default(0);

            // Minimum stock alert level
            $table->decimal('minimum_stock', 14, 3)->default(0);

            // Reorder quantity recommendation
            $table->decimal('reorder_quantity', 14, 3)->nullable();

            // Latest purchase price
            $table->decimal('purchase_price', 14, 2)->default(0);

            // Average costing (optional)
            $table->decimal('average_cost', 14, 2)->default(0);

            // Status
            $table->boolean('is_active')->default(true);

            // Optional image
            $table->string('image', 500)->nullable();

            // Notes
            $table->text('description')->nullable();

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groceries');
    }
};
