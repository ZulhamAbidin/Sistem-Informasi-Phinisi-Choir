<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('balasan_komentars', function (Blueprint $table) {
            $table->integer('jumlah_suka')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('balasan_komentars', function (Blueprint $table) {
            $table->dropColumn('jumlah_suka');
        });
    }
};

