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
        Schema::create('standar_uang_harian', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('tingkat_sppd_id');
            $table->unsignedTinyInteger('jenis_sppd_id');
            $table->unsignedTinyInteger('provinsi_id');
            $table->unsignedSmallInteger('kabupaten_id')->nullable();
            $table->unsignedSmallInteger('kecamatan_id')->nullable();

            $table->foreign('tingkat_sppd_id')->references('id')->on('ref_tingkat_sppd')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jenis_sppd_id')->references('id')->on('ref_jenis_sppd')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('provinsi_id')->references('id')->on('wilayah_provinsi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kabupaten_id')->references('id')->on('wilayah_kabupaten_kota')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('kecamatan_id')->references('id')->on('wilayah_kecamatan')->onUpdate('cascade')->onDelete('set null');
            $table->year('tahun');
            $table->double('uang_harian');
            $table->double('batas_biaya_penginapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standar_uang_harian');
    }
};
