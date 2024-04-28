<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelompok extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }

    public function dosenPembimbing()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'kelompok_id');
    }
}
