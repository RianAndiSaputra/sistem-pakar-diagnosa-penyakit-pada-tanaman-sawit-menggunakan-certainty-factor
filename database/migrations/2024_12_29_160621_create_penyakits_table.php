<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('penyakits', function (Blueprint $table) {
            $table->id();                            // Kolom ID (primary key)
            $table->string('kode');                  // Kolom kode penyakit
            $table->string('nama_penyakit');         // Kolom nama penyakit
            $table->text('deskripsi')->nullable();   // Kolom deskripsi, bisa kosong
            $table->text('solusi')->nullable();      // Kolom solusi, bisa kosong
            $table->text('gejala');                  // Kolom gejala
            $table->timestamps();                    // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('penyakits');
    }
};
