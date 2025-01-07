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
        Schema::create('employee_tbl', function (Blueprint $table) {
            $table->id('employee_id');
            $table->integer('auth_id');
            $table->enum('account_status', ['available', 'dormant'])->default('available');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('picture')->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->default('male');
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->decimal('salary', 10, 2);
            $table->date('hired_date')->nullable();
            $table->timestamps();
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
