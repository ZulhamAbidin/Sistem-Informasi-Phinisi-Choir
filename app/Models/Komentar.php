<?php


namespace App\Models;
use Carbon\Carbon;
use App\Models\Postingan;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars';

     protected $attributes = [
        'isi_komentar' => null,
    ];

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

    public function komentars()
{
    return $this->hasMany(Komentar::class, 'postingan_id');
}

public function balasanKomentars()
    {
        return $this->hasMany(BalasanKomentar::class, 'parent_komentar_id');
    }


    public function timeElapsedString()
    {
        $now = Carbon::now();
        $created = Carbon::parse($this->created_at);

        $diff = $created->diffForHumans($now);

        return $diff;
    }

    

    
}
