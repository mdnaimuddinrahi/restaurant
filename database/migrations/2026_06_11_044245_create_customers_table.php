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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            // Basic information
            $table->string('name', 255);

            // Login credentials
            $table->string('email', 255)->nullable()->unique();
            $table->string('phone', 20)->unique();
            $table->string('password');

            // Verification
            $table->dateTime('verified_at')->nullable();
            
            $table->string('profile_img', 500)->nullable();
            // Status
            $table->tinyInteger('status')->default(0);
            
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
};
