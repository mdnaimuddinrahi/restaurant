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
        Schema::create('grocery_purchases', function (Blueprint $table) {
            $table->id();

            // Purchase number/reference
            $table->string('purchase_no', 50)->unique();

            // Supplier
            $table->unsignedBigInteger('supplier_id')->nullable();

            // Invoice information
            $table->string('invoice_no', 100)->nullable();

            // Date of purchase
            $table->date('purchase_date');

            // Financial information
            $table->decimal('subtotal_amount', 14, 2)->default(0);
            $table->decimal('discount_amount', 14, 2)->default(0);
            $table->decimal('tax_amount', 14, 2)->default(0);
            $table->decimal('shipping_cost', 14, 2)->default(0);
            $table->decimal('total_amount', 14, 2)->default(0);

            // Payment
            $table->decimal('paid_amount', 14, 2)->default(0);
            $table->decimal('due_amount', 14, 2)->default(0);

            // Status
            // 0 = Pending
            // 1 = Received
            // 2 = Partial
            // 3 = Cancelled
            $table->tinyInteger('status')->default(0);

            // Payment status
            // 0 = Unpaid
            // 1 = Partial
            // 2 = Paid
            $table->tinyInteger('payment_status')->default(0);

            // Optional note
            $table->text('remarks')->nullable();

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grocery_purchases');
    }
};
