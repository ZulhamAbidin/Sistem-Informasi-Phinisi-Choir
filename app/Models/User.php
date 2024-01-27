<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Events\UserVerified; // Tambahkan ini
use App\Events\UserStatusChanged;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nra',
        'password',
        'role', 
        'status',
        'foto', 

    
    ];

 protected static function boot()
    {
        parent::boot();

        static::observe(\App\Observers\UserStatusChangedObserver::class);
    }

    protected $observe = [
    'App\Observers\UserStatusChangedObserver',
];

    public function updateStatusToTerverifikasi()
    {
        $this->update(['status' => 'terverifikasi']);
        // Event akan dipicu melalui observer
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'user_id');
    }

    public function hasData()
    {
        return $this->anggota()->exists();
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'role' => 'string', 
        'status' => 'string',
    ];
}
