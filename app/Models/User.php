<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $validator = Validator::make([
                'nim' => $user->nim,
                'nip' => $user->nip
            ], [
                'nim' => 'nim_xor_nip',
            ]);

            if ($validator->fails()) {
                throw new \Exception('Harus ada NIM atau NIP, tidak keduanya.');
            }
        });
    }
    
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function proyeks()
    {
        return $this->hasMany(Proyek::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

}
