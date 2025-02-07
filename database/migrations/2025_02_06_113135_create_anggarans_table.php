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
        Schema::create('anggaran', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->unsignedBigInteger('sub_kegiatan_id');
            $table->foreign('sub_kegiatan_id')->references('id')->on('ref_kegiatan_sub')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('jenis_sppd_id');
            $table->foreign('jenis_sppd_id')->references('id')->on('ref_jenis_sppd')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('bidang_sub_id');
            $table->foreign('bidang_sub_id')->references('id')->on('ref_bidang_sub')->onUpdate('cascade')->onDelete('cascade');
            $table->double('rp_pagu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggaran');
    }
};
