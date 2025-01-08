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
        Schema::create('reservation_tbl', function (Blueprint $table) {
            $table->id("reservation_id");
            $table->bigInteger('room_id');
            $table->bigInteger('employee_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->enum('is_checkin', ['true', 'false']);
            $table->enum('is_checkout', ['true', 'false']);
            $table->enum('reservation_type', ['booked', 'reserve'])->default('reserve');
            $table->integer('adults')->default(1);
            $table->integer('children')->default(0);
            $table->enum('payment_status', ['paid', 'pending', 'cancel'])->default('paid');
            $table->enum('payment_method', ['cash', 'credit card', 'khqr'])->default('cash');
            $table->string('memo')->nullable();
            $table->enum('is_hidden', ['true', 'false'])->default('false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
