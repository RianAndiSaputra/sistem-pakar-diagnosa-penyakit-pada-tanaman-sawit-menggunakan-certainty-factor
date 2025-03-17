<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // In your database/migrations/xxxx_xx_xx_xxxxxx_create_penyakit_table.php file

  public function up()
  {
      Schema::create('penyakit', function (Blueprint $table) {
          $table->id();
          $table->string('kode'); // Pastikan kolom kode ada
          $table->string('nama_penyakit');
          $table->text('deskripsi')->nullable();
          $table->text('solusi')->nullable();
          $table->timestamps();
      });
  }
  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyakit');
    }
};
