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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_tempat_pembuangan')->nullable();
            $table->enum('status',['rest','siaga','cuti']);
            $table->enum('role',['lapangan','penjaga']);
            $table->timestamps();
            //relasi nya bang
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(columns: 'id_tempat_pembuangan')->references('id')->on('tempat_pembuangans')->onUpdate('cascade')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
