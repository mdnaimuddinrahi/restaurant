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
        Schema::create('grocery_suppliers', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('name', 255)->unique();
            $table->string('code', 100)->unique();

            // Contact Person
            $table->string('contact_person', 255)->nullable();

            // Contact Information
            $table->string('phone', 20)->nullable();
            $table->string('email', 255)->nullable()->unique();
            $table->string('website', 500)->nullable();

            // Address
            $table->text('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('postal_code', 20)->nullable();

            // Tax Information
            $table->string('tax_number', 100)->nullable();

            // Financial Information
            $table->decimal('opening_balance', 14, 2)->default(0);

            // Status
            $table->boolean('is_active')->default(true);

            // Additional Information
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
        Schema::dropIfExists('grocery_suppliers');
    }
};
