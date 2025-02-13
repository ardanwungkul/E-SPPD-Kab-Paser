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
        Schema::create('transaksi_spt_pegawai', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('spt_id');
            $table->foreign('spt_id')->references('id')->on('transaksi_spt')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedTinyInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_spt_pegawai');
    }
};
