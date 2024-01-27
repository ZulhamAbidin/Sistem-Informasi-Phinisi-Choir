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
        Schema::table('anggota', function (Blueprint $table) {
            $table->string('nra')->after('id'); // Anda dapat menyesuaikan tipe kolom sesuai kebutuhan
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('anggota', function (Blueprint $table) {
            $table->dropColumn('nra');
        });
    }
};
