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
        Schema::create('grocery_stock_ledgers', function (Blueprint $table) {
            $table->id();

            // Which grocery item
            $table->unsignedBigInteger('grocery_id');

            // Reference document
            $table->string('reference_type', 50);
            // GroceryPurchase, Sale, Adjustment, Wastage, Return, etc.

            $table->unsignedBigInteger('reference_id')->nullable();

            // Transaction direction
            // 1 = Stock In
            // 2 = Stock Out
            // 3 = Adjustment
            $table->tinyInteger('transaction_type');

            // Quantity moved
            $table->decimal('quantity', 14, 3);

            // Unit cost during transaction
            $table->decimal('unit_price', 14, 2)->default(0);

            // Total amount
            $table->decimal('total_amount', 14, 2)->default(0);

            // Stock before transaction
            $table->decimal('balance_before', 14, 3)->default(0);

            // Stock after transaction
            $table->decimal('balance_after', 14, 3)->default(0);

            // Optional remarks
            $table->text('remarks')->nullable();

            // Transaction date
            $table->dateTime('transaction_date');

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
        Schema::dropIfExists('grocery_stock_ledgers');
    }
};
