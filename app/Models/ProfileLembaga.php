<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileLembaga extends Model
{
    use HasFactory;

    protected $table = 'profile_lembaga';

    protected $fillable = [
        'body',
        'noponsel',
        'judul',
        // Tambahkan properti lainnya sesuai kebutuhan
    ];
}
