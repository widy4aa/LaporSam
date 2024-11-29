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
        Schema::create('tempat_pembuangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->float('daya_tampung');
            $table->enum('jenis',['TPS','TPA']);
            $table->string('link_gambar');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE tempat_pembuangans ADD location POINT NOT NULL');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_pembuangans');
    }
};
