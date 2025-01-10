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
        Schema::create('product_stock_tbl', function (Blueprint $table) {
            $table->id('product_stock_id');
            $table->integer('product_id');
            $table->integer('supplier_id')->nullable();
            $table->string('inv_number')->nullable();
            $table->integer('product_add')->default(0);
            $table->decimal('add_price', 10, 2)->default(0);
            $table->date('add_date')->nullable();
            $table->string('memo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stocks');
    }
};
