<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();

            // Tambahkan indeks ke kolom user_id untuk kinerja
            $table->index('user_id');

            // Tambahkan kunci asing ke kolom user_id yang merujuk ke id pada tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropIndex(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
