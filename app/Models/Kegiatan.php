<?php

namespace App\Models;

use App\Models\KomentarKegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = [
        'tanggal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function komentar()
    {
        return $this->hasMany(KomentarKegiatan::class);
    }
}
