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
