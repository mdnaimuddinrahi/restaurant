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
        Schema::create('grocery_purchase_items', function (Blueprint $table) {
            $table->id();
            // Purchase header
            $table->unsignedBigInteger('grocery_purchase_id');

            // Purchased grocery
            $table->unsignedBigInteger('grocery_id');

            // Unit used when purchased
            $table->unsignedBigInteger('grocery_unit_id');

            // Quantity purchased
            $table->decimal('quantity', 14, 3);

            // Price at purchase time
            $table->decimal('unit_price', 14, 2);

            // Optional discount per line
            $table->decimal('discount_amount', 14, 2)->default(0);

            // Tax amount for this line
            $table->decimal('tax_amount', 14, 2)->default(0);

            // Final line amount
            $table->decimal('subtotal', 14, 2);

            // Optional remarks
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('grocery_purchase_items');
    }
};
