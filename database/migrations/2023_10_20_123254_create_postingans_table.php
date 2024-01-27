<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostingansTable extends Migration
{
    public function up()
    {
        Schema::create('postingans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_postingan');
            $table->string('kategori');
            $table->string('sampul');
            $table->string('gambar_pendukung');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->integer('jumlah_suka');
            $table->string('sumber');
            $table->integer('rating')->default(0); // Kolom peringkat (rating) dengan nilai default 0
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('postingans');
    }
}
