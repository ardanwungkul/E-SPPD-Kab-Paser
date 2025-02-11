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
        Schema::create('wilayah_kecamatan', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nama', 50);
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->unsignedSmallInteger('kabupaten_kota_id');
            $table->foreign('kabupaten_kota_id')->references('id')->on('wilayah_kabupaten_kota')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_kecamatan');
    }
};
