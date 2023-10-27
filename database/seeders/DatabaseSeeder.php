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
                'nama_lengkap' => 'admin',
                'nra' => 'admin',
                'password' => bcrypt('admin'), 
                'role' => 'admin',
                'status' => 'terverifikasi',
            ],
            [
                'nama_lengkap' => 'super_admin',
                'nra' => 'super_admin',
                'password' => bcrypt('super_admin'), 
                'role' => 'super_admin',
                'status' => 'terverifikasi',
            ],

        ];

        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
