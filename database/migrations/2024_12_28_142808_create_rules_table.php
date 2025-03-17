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
        Schema::create('rules', function (Blueprint $table) {
            $table->id(); // ID Primary Key
            $table->string('nama_aturan'); // Kolom untuk nama aturan
            $table->text('gejala'); // Kolom untuk daftar gejala
            $table->string('penyakit'); // Kolom langsung menyimpan nama penyakit
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
