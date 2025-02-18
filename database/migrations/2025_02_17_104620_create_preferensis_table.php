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
        Schema::create('preferensi', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nama_aplikasi');
            $table->string('instansi_alamat');
            $table->unsignedTinyInteger('instansi_provinsi')->nullable();
            $table->foreign('instansi_provinsi')->references('id')->on('wilayah_provinsi')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedSmallInteger('instansi_kabupaten_kota')->nullable();
            $table->foreign('instansi_kabupaten_kota')->references('id')->on('wilayah_kabupaten_kota')->onUpdate('cascade')->onDelete('set null');
            $table->string('instansi_kontak_email');
            $table->string('instansi_kontak_fax');
            $table->string('instansi_kontak_telp');
            $table->string('instansi_logo');
            $table->string('instansi_nama');
            $table->string('instansi_pemerintah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferensis');
    }
};
