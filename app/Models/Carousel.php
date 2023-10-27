<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $table = 'carousels'; // Sesuaikan nama tabel

    protected $fillable = ['image_path', 'title', 'description'];
}
