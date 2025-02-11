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
        Schema::create('transaksi_nota_dinas', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->year('tahun');
            $table->enum('status', [0, 1, 2]);
            $table->date('tanggal');
            $table->string('nomor', 5);
            $table->text('perihal');
            $table->text('isi');

            $table->unsignedTinyInteger('pegawai_id_dari');
            $table->unsignedTinyInteger('pegawai_id_melalui')->nullable();
            $table->unsignedTinyInteger('pegawai_id_kepada');
            $table->unsignedSmallInteger('sub_kegiatan_id');
            $table->unsignedSmallInteger('sub_bidang_id');
            $table->unsignedTinyInteger('jenis_sppd_id');

            $table->foreign('pegawai_id_dari')->references('id')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pegawai_id_melalui')->references('id')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pegawai_id_kepada')->references('id')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sub_kegiatan_id')->references('id')->on('ref_kegiatan_sub')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sub_bidang_id')->references('id')->on('ref_bidang_sub')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jenis_sppd_id')->references('id')->on('ref_jenis_sppd')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_nota_dinas');
    }
};
