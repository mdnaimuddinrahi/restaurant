<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_recipes', function (Blueprint $table) {
            $table->id();

            $table->string('name',255);

            // Appetizer, Main Course, Dessert, Beverage, etc.
            $table->string('type',100)->nullable();

            $table->string('slug',255)->unique();

            // YouTube/Facebook/Instagram link
            $table->string('video_link',500)->nullable();

            // Banner image
            $table->string('image',500)->nullable();

            // Social media publishable
            $table->boolean('is_publishable')->default(false);

            // Draft / Published
            $table->boolean('is_active')->default(true);

            // Blog content
            $table->longText('description')->nullable();

            // Optional SEO
            $table->string('meta_title',255)->nullable();
            $table->string('meta_keywords',500)->nullable();
            $table->text('meta_description')->nullable();

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
        Schema::dropIfExists('product_recipes');
    }
};
