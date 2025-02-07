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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->unsignedBigInteger('pangkat_id')->nullable();
            $table->foreign('pangkat_id')->references('id')->on('ref_pangkat')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('tingkat_id')->nullable();
            $table->foreign('tingkat_id')->references('id')->on('ref_tingkat_sppd')->onUpdate('cascade')->onDelete('set null');
            $table->string('jabatan');
            $table->string('jenis_pegawai');
            $table->string('no_hp');
            $table->longText('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
