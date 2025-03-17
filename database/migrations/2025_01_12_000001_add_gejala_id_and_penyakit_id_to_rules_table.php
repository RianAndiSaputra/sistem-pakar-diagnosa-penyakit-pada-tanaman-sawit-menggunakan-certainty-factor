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
        Schema::table('rules', function (Blueprint $table) {
            // Tambahkan kolom gejala_id dan penyakit_id
            $table->unsignedBigInteger('gejala_id')->after('id');
            $table->unsignedBigInteger('penyakit_id')->after('gejala_id');

            // Tambahkan foreign key constraints
            $table->foreign('gejala_id')->references('id')->on('gejala')->onDelete('cascade');
            $table->foreign('penyakit_id')->references('id')->on('penyakit')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('rules', function (Blueprint $table) {
            // Hapus foreign key constraints
            $table->dropForeign(['gejala_id']);
            $table->dropForeign(['penyakit_id']);

            // Hapus kolom gejala_id dan penyakit_id
            $table->dropColumn('gejala_id');
            $table->dropColumn('penyakit_id');
        });
    }
};
