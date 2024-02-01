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
        Schema::table('profile_lembaga', function (Blueprint $table) {
            // Ubah kolom judul menjadi nullable
            $table->string('judul')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
      public function down(): void
    {
        Schema::table('profile_lembaga', function (Blueprint $table) {
            // Ubah kembali ke kondisi awal jika rollback
            $table->string('judul')->change();
        });
    }
};
