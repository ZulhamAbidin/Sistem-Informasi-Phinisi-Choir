<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomBaruKePostingans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postingans', function (Blueprint $table) {
            // Menambahkan kolom highlights dengan tipe data boolean
            $table->boolean('highlights')->default(false);

            // Menambahkan kolom sampai_dengan_tanggal
            $table->date('sampai_dengan_tanggal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postingans', function (Blueprint $table) {
            // Menghapus kolom highlights dan sampai_dengan_tanggal jika migrasi di-rollback
            $table->dropColumn(['highlights', 'sampai_dengan_tanggal']);
        });
    }
};
