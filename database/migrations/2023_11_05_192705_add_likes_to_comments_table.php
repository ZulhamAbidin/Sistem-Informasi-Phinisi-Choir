<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLikesToCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('komentars', function (Blueprint $table) {
            $table->integer('jumlah_suka')->default(0);
        });
    }

    public function down()
    {
        Schema::table('komentars', function (Blueprint $table) {
            $table->dropColumn('jumlah_suka');
        });
    }
}
