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
        Schema::create('close_shift_tbl', function (Blueprint $table) {
            $table->id('close_shift_id');
            $table->integer('employee_id')->nullable();
            $table->integer('bank_note_id')->nullable();
            $table->decimal('close_khmer_riel', 20, 2)->default(0);
            $table->decimal('close_us_dollar', 20, 2)->default(0);
            $table->string('shift_code');
            $table->date('close_date');
            $table->time('close_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('close_shifts');
    }
};
