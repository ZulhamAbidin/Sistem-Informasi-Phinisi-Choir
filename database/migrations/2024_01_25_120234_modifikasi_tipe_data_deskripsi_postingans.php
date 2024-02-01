<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifikasiTipeDataDeskripsiPostingans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postingans', function (Blueprint $table) {
            // Mengubah tipe data kolom deskripsi dari text menjadi varchar
            $table->longText('deskripsi')->change();
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
            // Jika perlu di-rollback, kembalikan tipe data ke semula
            $table->text('deskripsi')->change();
        });
    }
}

