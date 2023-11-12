<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersData = [
            [
                'nama_lengkap' => 'Anggota Biasa',
                'nra' => 'G02.002.002',
                'password' => bcrypt('G02.002.002'), 
                'role' => 'admin',
                'status' => 'terverifikasi',
            ],
            [
                'nama_lengkap' => 'super_admin',
                'nra' => 'G01.001.001',
                'password' => bcrypt('G01.001.001'), 
                'role' => 'super_admin',
                'status' => 'terverifikasi',
            ],

        ];

        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
