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
            $table->smallIncrements('id');
            $table->string('kode', 10);
            $table->year('tahun');
            $table->string('uraian', 100);
            $table->string('program_kode', 10);
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
