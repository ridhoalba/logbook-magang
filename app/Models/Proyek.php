<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyek extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $userId;
    public function setUserId($userId)
{
    $this->userId = $userId;
}

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mentions()
    {
        return $this->belongsToMany(User::class, 'proyek_mention')->withTimestamps()->whereHas('kelompok', function ($query) {
            $query->where('id', auth()->user()->kelompok_id);
        });
    }
    public function mentionsP()
    {
        return $this->belongsToMany(User::class, 'proyek_mention')->withTimestamps()->whereHas('kelompok');
    }

    public function komentar()
    {
        return $this->hasMany(KomentarProyek::class);
    }
}
