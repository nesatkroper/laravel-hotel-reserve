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
        Schema::create('open_shift_tbl', function (Blueprint $table) {
            $table->id('open_shift_id');
            $table->integer('employee_id')->nullable();
            $table->integer('bank_note_id')->nullable();
            $table->decimal('open_khmer_riel', 20, 2)->default(0);
            $table->decimal('open_us_dollar', 20, 2)->default(0);
            $table->string('shift_code');
            $table->date('open_date');
            $table->time('open_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_shifts');
    }
};
