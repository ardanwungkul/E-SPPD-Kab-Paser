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
        Schema::create('config_kop_surat', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('dprd_header_1', 100);
            $table->string('dprd_header_2', 100);
            $table->string('dprd_header_3', 100);
            $table->string('dprd_header_4', 100);
            $table->string('dprd_logo')->nullable();
            $table->string('setwan_header_1', 100);
            $table->string('setwan_header_2', 100);
            $table->string('setwan_header_3', 100);
            $table->string('setwan_header_4', 100);
            $table->string('setwan_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_kop_surat');
    }
};
