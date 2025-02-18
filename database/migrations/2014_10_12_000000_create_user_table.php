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
        Schema::create('user', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedSmallInteger('bidang_id')->nullable();
            $table->foreign('bidang_id')->references('id')->on('ref_bidang')->onUpdate('cascade')->onDelete('set null');
            $table->string('name', 30);
            $table->string('username', 20)->unique();
            $table->string('email', 30)->unique();
            $table->dateTime('terakhir_login')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
