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
        Schema::create('product_varieties', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255)->unique();
            $table->string('slug', 255)->unique();

            $table->unsignedBigInteger('category_id')->nullable();

            // 1 = Active, 0 = Inactive
            $table->tinyInteger('status')->default(1);

            // Optional image/icon
            $table->string('image')->nullable();

            // Optional description
            $table->text('description')->nullable();

            // Display order
            $table->unsignedSmallInteger('sort_order')->default(0);

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
        Schema::dropIfExists('product_varieties');
    }
};
