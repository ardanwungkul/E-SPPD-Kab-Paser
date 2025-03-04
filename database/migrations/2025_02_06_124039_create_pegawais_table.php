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
            $table->tinyIncrements('id');
            $table->string('nip', 21);
            $table->string('nama', 70);
            $table->unsignedTinyInteger('pangkat_id')->nullable();
            $table->foreign('pangkat_id')->references('id')->on('ref_pangkat')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedTinyInteger('tingkat_id')->nullable();
            $table->foreign('tingkat_id')->references('id')->on('ref_tingkat_sppd')->onUpdate('cascade')->onDelete('set null');

            $table->unsignedSmallInteger('bidang_sub_id');
            $table->foreign('bidang_sub_id')->references('id')->on('ref_bidang_sub')->onUpdate('cascade')->onDelete('cascade');

            $table->string('jabatan', 70)->nullable();
            $table->string('no_hp', 30)->nullable();
            $table->tinyText('alamat')->nullable();
            $table->string('keterangan', 70)->nullable();
            $table->enum('ttd_default', ['Y', 'N']);
            $table->enum('aktif', ['Y', 'N'])->default('Y');
            $table->timestamps();
            $table->softDeletes();
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
