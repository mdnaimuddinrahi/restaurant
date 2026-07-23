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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_type_id');
            $table->unsignedBigInteger('employee_designation_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name', 255);
            $table->string('email', 255)->unique()->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->boolean('is_active')->default(true);
            $table->tinyInteger('gender')->nullable(); // 1: Male, 2: Female, 3: Other
            $table->string('national_id', 50)
                    ->nullable()
                    ->unique();

            $table->string('passport_number', 50)
                ->nullable()
                ->unique();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone', 20)->nullable();
            $table->string('emergency_contact_relation', 100)->nullable();
            $table->string('emergency_contact_email', 255)->nullable();
            $table->json('documents')->nullable(); // JSON field to store document paths or details
            $table->string('profile_img')->nullable();
            $table->string('resume')->nullable();
            $table->decimal('basic_salary', 12, 2)->nullable();
            $table->tinyInteger('blood_group')->default(0);
            $table->tinyInteger('marital_status')->default(0);
             // shift timing
            $table->string('shift_start')->nullable();
            $table->string('shift_end')->nullable();
            
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
        Schema::dropIfExists('employees');
    }
};
