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
        Schema::create('product_tbl', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->integer('product_category_id');
            $table->string('picture')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('discount_rate')->default(0);
            $table->enum('status', ['true', 'false'])->default('true');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
