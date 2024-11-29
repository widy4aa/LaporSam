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
        Schema::create('jadwal_petugas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_jadwal');
            $table->timestamps();
            //relasi nya bang
            $table->foreign('id_petugas')->references('id')->on('petugas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_petugas');
    }
};
