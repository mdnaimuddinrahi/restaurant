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
        Schema::create('employee_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique(); // part-time, full-time, contractor, etc.
            $table->string('code', 100)->unique(); // e.g., PT, FT, CTR
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1);
            // shift timing
            $table->string('shift_start', 50)->nullable();
            $table->string('shift_end', 50)->nullable();

            // duration in minutes
            $table->unsignedSmallInteger('working_hours')->nullable();
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
        Schema::dropIfExists('employee_types');
    }
};
