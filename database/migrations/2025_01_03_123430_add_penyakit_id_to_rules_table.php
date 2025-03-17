<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenyakitIdToRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rules', function (Blueprint $table) {
            $table->unsignedBigInteger('penyakit_id')->after('gejala')->nullable();
            $table->foreign('penyakit_id')->references('id')->on('penyakits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rules', function (Blueprint $table) {
            $table->dropForeign(['penyakit_id']);
            $table->dropColumn('penyakit_id');
        });
    }
}
