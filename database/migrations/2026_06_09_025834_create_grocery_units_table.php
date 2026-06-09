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
        Schema::create('grocery_units', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();          // Kilogram
            $table->string('short_name', 20)->unique();     // kg
            $table->string('code', 20)->nullable()->unique(); // KG

            $table->text('description')->nullable();

            $table->boolean('is_active')->default(true);
            
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
        Schema::dropIfExists('grocery_units');
    }
};
