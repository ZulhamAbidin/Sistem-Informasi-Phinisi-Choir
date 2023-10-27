<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    protected $table = 'postingans';

    protected $fillable = [
        'judul_postingan',
        'kategori',
        'sampul',
        'gambar_pendukung',
        'deskripsi',
        'lokasi',
        'jumlah_suka',
        'jumlah_dibaca',
        'sumber',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'postingan_id');
    }

    public function calculateAverageRating()
    {
        $averageRating = $this->ratings()->avg('rating');
        return round($averageRating, 2); // Mengambil rata-rata dan membulatkannya ke 2 desimal
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'postingan_id');
    }
}
