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
            $table->string('nama', 50);
            $table->unsignedTinyInteger('pangkat_id')->nullable();
            $table->foreign('pangkat_id')->references('id')->on('ref_pangkat')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedTinyInteger('tingkat_id')->nullable();
            $table->foreign('tingkat_id')->references('id')->on('ref_tingkat_sppd')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedTinyInteger('jabatan_id')->nullable();
            $table->foreign('jabatan_id')->references('id')->on('ref_jabatan')->onUpdate('cascade')->onDelete('set null');
            $table->string('no_hp', 30)->nullable();
            $table->longText('alamat')->nullable();
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
