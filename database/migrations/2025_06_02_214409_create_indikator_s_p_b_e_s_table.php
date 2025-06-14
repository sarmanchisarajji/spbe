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
        Schema::create('indikator_s_p_b_e_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aspek_id')->constrained('aspek_s_p_b_e_s')->onDelete('cascade');
            $table->string('nama_indikator');
            $table->string('domain_cobit');
            $table->string('nama_cobit');
            $table->decimal('hasil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_s_p_b_e_s');
    }
};
