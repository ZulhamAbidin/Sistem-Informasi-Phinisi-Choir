<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPostingansTable extends Migration
{
    public function up()
    {
        Schema::table('postingans', function (Blueprint $table) {
            $table->string('gambar_pendukung', 5000)->change(); // Ubah panjang kolom 'gambar_pendukung'
        });
    }

    public function down()
    {
        // Anda bisa mendefinisikan perintah pembatalan di sini jika diperlukan
    }
}

