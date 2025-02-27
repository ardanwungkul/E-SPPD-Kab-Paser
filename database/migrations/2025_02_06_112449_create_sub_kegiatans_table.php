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
        Schema::create('ref_kegiatan_sub', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('kode', 10);
            $table->year('tahun');
            $table->unsignedSmallInteger('kegiatan_id');
            $table->foreign('kegiatan_id')->references('id')->on('ref_kegiatan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('uraian', 200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_kegiatan_sub');
    }
};
