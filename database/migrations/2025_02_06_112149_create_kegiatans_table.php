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
        Schema::create('ref_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->year('tahun');
            $table->string('uraian');
            $table->string('program_kode');
            $table->foreign('program_kode')->references('kode')->on('ref_program')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_kegiatan');
    }
};
