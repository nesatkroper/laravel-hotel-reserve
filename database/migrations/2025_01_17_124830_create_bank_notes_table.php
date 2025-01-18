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
        Schema::create('bank_note_tbl', function (Blueprint $table) {
            $table->id('bank_note_id');
            $table->integer('khmer_100')->default(0);
            $table->integer('khmer_500')->default(0);
            $table->integer('khmer_1K')->default(0);
            $table->integer('khmer_2K')->default(0);
            $table->integer('khmer_5K')->default(0);
            $table->integer('khmer_10K')->default(0);
            $table->integer('khmer_15K')->default(0);
            $table->integer('khmer_20K')->default(0);
            $table->integer('khmer_30K')->default(0);
            $table->integer('khmer_50K')->default(0);
            $table->integer('khmer_100K')->default(0);
            $table->integer('khmer_200K')->default(0);
            $table->integer('us_1')->default(0);
            $table->integer('us_5')->default(0);
            $table->integer('us_10')->default(0);
            $table->integer('us_20')->default(0);
            $table->integer('us_50')->default(0);
            $table->integer('us_100')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_notes');
    }
};
