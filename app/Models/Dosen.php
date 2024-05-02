<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class Dosen extends Authenticatable
{
    protected $table = 'dosens';
    protected $fillable = [
        'name',
        'nip',
        'email',
        'password',
    ];
    
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

    public function KelompokBimbingan()
    {
        return $this->hasMany(Kelompok::class);
    }


}


// <?php

// namespace App\Models;

// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Dosen extends Authenticatable
// {
//     use HasFactory;

//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//     ];

//     public function KelompokBimbingan()
//     {
//         return $this->hasMany(Kelompok::class);
//     }
// }
