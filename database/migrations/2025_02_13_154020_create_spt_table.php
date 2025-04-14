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
        Schema::create('transaksi_spt', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->year('tahun');
            $table->enum('ub_status', ['Y', 'N']);
            $table->unsignedTinyInteger('penandatangan_id');
            $table->foreign('penandatangan_id')->references('id')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->date('penandatangan_tanggal');
            $table->string('penandatangan_lokasi', 100);
            $table->string('nomor', 100);
            $table->string('nomor_urut', 5);
            $table->string('nomor_urut_tambahan', 5)->nullable();
            $table->boolean('is_dprd')->default(false);

            $table->unsignedSmallInteger('sub_kegiatan_id');
            $table->foreign('sub_kegiatan_id')->references('id')->on('ref_kegiatan_sub')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedTinyInteger('jenis_sppd_id');
            $table->foreign('jenis_sppd_id')->references('id')->on('ref_jenis_sppd')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedSmallInteger('bidang_sub_id');
            $table->foreign('bidang_sub_id')->references('id')->on('ref_bidang_sub')->onUpdate('cascade')->onDelete('cascade');

            $table->date('tanggal_berangkat');
            $table->date('tanggal_kembali');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_spt');
    }
};
