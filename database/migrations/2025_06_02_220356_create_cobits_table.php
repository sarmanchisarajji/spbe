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
        Schema::create('cobits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluasi_id')->constrained('evaluasis')->onDelete('cascade');
            $table->foreignId('indikator_id')->constrained('indikator_s_p_b_e_s')->onDelete('cascade');

            $table->decimal('kematangan_indikator', 5, 2)->nullable();
            $table->string('level');
            $table->enum('ada', ['ya', 'tidak']);
            $table->enum('nilai', ['n', 'p', 'l', 'f']);
            $table->text('pertanyaan');
            $table->string('catatan', 255);
            $table->string('bukti_pendukung')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cobits');
    }
};
