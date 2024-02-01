<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'generasi',
        'nra',
        'alamat',
        'notelfon',
        'motto',
        'deskripsi',
         'foto', // Menambahkan 'foto' sebagai kolom yang dapat diisi
        'user_id', // Menambahkan user_id sebagai kolom yang akan digunakan untuk relasi
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
