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
        Schema::create('wilayah_desa', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nama', 50);
            $table->string('kode_pos', 5)->nullable();
            $table->unsignedSmallInteger('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('wilayah_kecamatan')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_desa');
    }
};
