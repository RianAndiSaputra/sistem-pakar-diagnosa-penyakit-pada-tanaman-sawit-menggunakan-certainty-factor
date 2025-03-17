<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRulesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('rules', function (Blueprint $table) {
            // Mengubah kolom 'gejala' menjadi 'id_gejala'
            $table->renameColumn('gejala', 'id_gejala');
            // Mengubah kolom 'penyakit' menjadi 'id_penyakit'
            $table->renameColumn('penyakit', 'id_penyakit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('rules', function (Blueprint $table) {
            // Mengembalikan perubahan jika migrasi dibatalkan
            $table->renameColumn('id_gejala', 'gejala');
            $table->renameColumn('id_penyakit', 'penyakit');
        });
    }
}
