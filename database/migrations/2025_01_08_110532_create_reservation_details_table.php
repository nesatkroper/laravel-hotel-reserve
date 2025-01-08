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
        Schema::create('reservation_detail_tbl', function (Blueprint $table) {
            $table->id('reservation_detail_id');
            $table->integer('reservation_id')->nullable();
            $table->integer('employee_id')->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('memo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_details');
    }
};
