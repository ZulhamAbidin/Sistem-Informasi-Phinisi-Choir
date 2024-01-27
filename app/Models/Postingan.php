<?php

namespace App\Models;
use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    protected $table = 'postingans';

    protected $fillable = ['judul_postingan', 'kategori', 'sampul', 'gambar_pendukung', 'deskripsi', 'lokasi', 'jumlah_suka', 'jumlah_dibaca', 'sumber', 'sampai_dengan_tanggal', 'highlights'];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'postingan_id');
    }

    public function totalRating()
    {
        return $this->komentars()->sum('rating');
    }

    public function averageRating()
    {
        $totalRating = $this->totalRating();
        $totalKomentar = $this->komentars()->count();

        if ($totalKomentar > 0) {
            return $totalRating / $totalKomentar;
        } else {
            return 0;
        }
    }

    public function totalKomentar()
    {
        return $this->komentars()->count();
    }

    public function getTotalRatingAttribute()
    {
        return $this->komentars->sum('rating');
    }

    protected $casts = [
        'highlights' => 'boolean',
        'sampai_dengan_tanggal' => 'date',
    ];
}
