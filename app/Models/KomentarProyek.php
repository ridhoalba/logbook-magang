<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarProyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'komentar',
        'id_proyek'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
