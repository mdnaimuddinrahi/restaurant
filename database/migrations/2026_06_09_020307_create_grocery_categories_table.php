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
        Schema::create('grocery_categories', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255)->unique();
            $table->string('slug', 255)->unique();

            // Optional short code
            $table->string('code', 50)->nullable();

            $table->text('description')->nullable();

            // 1 = active, 0 = inactive
            $table->boolean('is_active')->default(true);

            // Display order in UI
            $table->unsignedSmallInteger('sort_order')->default(0);

            // Category image/icon
            $table->string('image', 500)->nullable();

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
        Schema::dropIfExists('grocery_categories');
    }
};
