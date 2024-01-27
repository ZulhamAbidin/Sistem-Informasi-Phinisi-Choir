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
        Schema::table('jumbotrons', function (Blueprint $table) {
            $table->string('teks_button')->after('keterangan')->nullable();
            $table->string('judul')->after('teks_button')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jumbotrons', function (Blueprint $table) {
            $table->dropColumn('teks_button');
            $table->dropColumn('judul');
        });
    }
};
