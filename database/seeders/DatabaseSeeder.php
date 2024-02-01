<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Database\Seeder;

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
                'email' => 'terverifikasi@gmail.com',
            ],
            [
                'nama_lengkap' => 'super_admin',
                'nra' => 'G01.001.001',
                'password' => bcrypt('G01.001.001'), 
                'role' => 'super_admin',
                'status' => 'terverifikasi',
                'email' => 'terverifikasis@gmail.com',
            ],

        ];
        

        foreach ($usersData as $userData) {
            User::create($userData);
        }

        $anggotaData = [
            [
                'nama_lengkap' => 'Anggota 1',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'nra' => 'G001.001.001',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
                'jabatan' => 'Bendahara Umum',
                'generasi' => 'Generasi 1',
            ],
            [
                'nama_lengkap' => 'Anggota 2',
                'nra' => 'G001.001.002',
                'jabatan' => 'Sekretaris Umum',
                'generasi' => '10',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
            [
                'nama_lengkap' => 'Anggota 1',
                'nra' => 'G001.001.003',
                'jabatan' => 'Bendahara Umum',
                'generasi' => 'Generasi 1',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
            [
                'nama_lengkap' => 'Anggota 2',
                'nra' => 'G001.001.004',
                'jabatan' => 'Sekretaris Umum',
                'generasi' => '10',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],

            [
                'nama_lengkap' => 'Anggota 1',
                'nra' => 'G001.001.005',
                'jabatan' => 'Bendahara Umum',
                'generasi' => 'Generasi 1',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
            [
                'nama_lengkap' => 'Anggota 2',
                'nra' => 'G001.001.006',
                'jabatan' => 'Sekretaris Umum',
                'generasi' => '10',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
            [
                'nama_lengkap' => 'Anggota 1',
                'nra' => 'G001.001.007',
                'jabatan' => 'Bendahara Umum',
                'generasi' => 'Generasi 1',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
            [
                'nama_lengkap' => 'Anggota 2',
                'nra' => 'G001.001.008',
                'jabatan' => 'Sekretaris Umum',
                'generasi' => '10',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
            [
                'nama_lengkap' => 'Muhammad Syaban Rahmatullah Hidayah',
                'nra' => 'G001.001.009',
                'jabatan' => 'Bendahara Umum',
                'generasi' => 'Generasi 1',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
            [
                'nama_lengkap' => 'Anggota 1',
                'nra' => 'G001.001.010',
                'jabatan' => 'Bendahara Umum',
                'generasi' => 'Generasi 1',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
            [
                'nama_lengkap' => 'Anggota 1',
                'nra' => 'G001.001.011',
                'jabatan' => 'Bendahara Umum',
                'generasi' => 'Generasi 1',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
            [
                'nama_lengkap' => 'Anggota 2',
                'nra' => 'G001.001.012',
                'jabatan' => 'Sekretaris Umum',
                'generasi' => '10',
                'notelfon' => '0895801138822',
                'foto' => '17002994090.png',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam doloribus magni neque assumenda? Quo sequi, praesentium perspiciatis atque error ducimus quae quia dolor, nam cum veritatis ipsa. Eum, eligendi neque.',
                'motto' => 'Jika Proses Adalah Luka Maka Bertahan Adalah Cinta',
                'alamat' => 'BTN Nuki Dwikarya Permai A5/23, Kec.Pallangga, Kab.Gowa',
            ],
        ];

        foreach ($anggotaData as $anggota) {
            Anggota::create($anggota);
        }
    }
}
