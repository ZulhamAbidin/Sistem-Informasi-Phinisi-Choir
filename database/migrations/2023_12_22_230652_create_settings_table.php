<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // Kolom untuk menyimpan kunci
            $table->string('value'); // Kolom untuk menyimpan nilai
            $table->timestamps();
        });

        // Insert default setting for registration status
        \DB::table('settings')->insert([
            'key' => 'registration_status',
            'value' => '1', // Atur ke '1' atau '0' sesuai kebutuhan default
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
