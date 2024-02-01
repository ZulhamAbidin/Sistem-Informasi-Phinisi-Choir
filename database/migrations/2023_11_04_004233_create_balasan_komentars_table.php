<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('balasan_komentars', function (Blueprint $table) {
           $table->id();
            $table->string('nama');
            $table->text('isi_balasan');
            $table->unsignedBigInteger('komentar_id');
            $table->unsignedBigInteger('parent_komentar_id')->nullable();
            $table->boolean('centang_biru')->default(false);
            $table->timestamps();

            $table->foreign('komentar_id')->references('id')->on('komentars')->onDelete('cascade');
            $table->foreign('parent_komentar_id')->references('id')->on('komentars')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balasan_komentars');
    }
};
