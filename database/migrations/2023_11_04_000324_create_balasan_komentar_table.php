<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalasanKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balasan_komentar', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('isi_balasan');
            $table->unsignedBigInteger('komentar_id');
            $table->unsignedBigInteger('parent_komentar_id')->nullable();
            $table->boolean('centang_biru')->default(false);
            $table->timestamps();

             $table->foreign('komentar_id')->references('id')->on('komentars')->onDelete('cascade');
            $table->foreign('parent_komentar_id')->references('id')->on('komentars')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balasan_komentar');
    }
}
