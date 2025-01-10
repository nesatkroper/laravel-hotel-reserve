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
        Schema::create('sale_tbl', function (Blueprint $table) {
            $table->id('sale_id');
            $table->integer('employee_id');
            $table->integer('room_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->date('sale_date')->nullable();
            $table->integer('discount_rate')->default(0);
            $table->decimal('total', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
