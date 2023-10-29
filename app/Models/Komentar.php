<?php

namespace App;
namespace App\Models;
use App\Models\Postingan;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars';

    protected $fillable = [
        'postingan_id',
        'nama',
        'isi_komentar',
        'rating',
    ];

    public function postingan()
    {
        return $this->belongsTo(Postingan::class, 'postingan_id');
    }
}
