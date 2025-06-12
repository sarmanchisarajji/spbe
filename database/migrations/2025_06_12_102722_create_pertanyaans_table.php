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
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indikator_id')->constrained('indikator_s_p_b_e_s')->onDelete('cascade');
            $table->string('level');
            $table->string('atribut_proses');
            $table->string('pertanyaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaans');
    }
};
