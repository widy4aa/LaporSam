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
        Schema::create('sampahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->unsignedBigInteger('id_petugas')->nullable();
            $table->unsignedBigInteger('id_tempat_pembuangan')->nullable();
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->enum('metode',['ambil','antar']);
            $table->enum('status',['pending','selesai','menunggu']);
            $table->float('berat');
            $table->timestamps();
            //relasi nya bang
            $table->foreign('id_pengguna')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('id_petugas')->references('id')->on('petugas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('id_tempat_pembuangan')->references('id')->on('tempat_pembuangans')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampahs');
    }
};
