<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings'; // Sesuaikan nama tabel jika berbeda

    protected $fillable = [
        'rating',  // Kolom untuk menyimpan peringkat (misalnya, 1 hingga 5)
        'user_id', // ID pengguna yang memberikan peringkat
        'postingan_id', // ID postingan yang diberi peringkat
    ];

    public function postingan()
    {
        return $this->belongsTo(Postingan::class, 'postingan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
