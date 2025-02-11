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
        Schema::create('ref_bidang_sub', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('bidang_id');
            $table->foreign('bidang_id')->references('id')->on('ref_bidang')->onUpdate('cascade')->onDelete('cascade');
            $table->year('tahun');
            $table->string('uraian', 100);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_bidang_sub');
    }
};
