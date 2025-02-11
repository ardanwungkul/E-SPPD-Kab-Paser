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
        Schema::create('transaksi_nota_dinas_disposisi', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('nota_dinas_id');
            $table->foreign('nota_dinas_id')->references('id')->on('transaksi_nota_dinas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('lampiran');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_nota_dinas_disposisi');
    }
};
