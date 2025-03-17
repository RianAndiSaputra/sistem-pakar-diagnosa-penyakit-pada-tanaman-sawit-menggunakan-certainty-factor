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
        $table->decimal('nilai_cf', 5, 2); // Angka desimal dengan 2 angka di belakang koma
    });
}

public function down()
{
    Schema::table('rules', function (Blueprint $table) {
        $table->dropColumn('nilai_cf');
    });
}
};
