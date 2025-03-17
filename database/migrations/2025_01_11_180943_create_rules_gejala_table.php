<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesGejalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules_gejala', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rule_id'); // Foreign key ke tabel rules
            $table->unsignedBigInteger('gejala_id'); // Foreign key ke tabel gejala
            $table->timestamps();

            // Tambahkan foreign key constraints
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');
            $table->foreign('gejala_id')->references('id')->on('gejala')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules_gejala');
    }
}
