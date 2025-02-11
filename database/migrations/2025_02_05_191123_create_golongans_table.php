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
        Schema::create('ref_pangkat', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('kode_golongan', 10);
            $table->tinyInteger('jenis_pegawai');
            $table->string('uraian', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_pangkat');
    }
};
