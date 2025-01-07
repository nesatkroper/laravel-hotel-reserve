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
        Schema::create('room_tbl', function (Blueprint $table) {
            $table->id('room_id');
            $table->enum('room_type', ['single', 'double', 'suite'])->default('single');
            $table->string('room_name')->nullable();
            $table->integer('group_picture')->nullable();
            $table->decimal('price', 10, 2);
            $table->enum('is_ac', ['true', 'false'])->default('true');
            $table->integer('capacity')->default(4);
            $table->integer('size')->default(25);
            $table->integer('discount_rate')->default(0);
            $table->enum('is_booked', ['true', 'false'])->default('false');
            $table->enum('status', ['available', 'maintenance', 'outofservice'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
