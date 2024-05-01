<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Proyek;
use App\Models\Kegiatan;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Http\Middleware\dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DosenBerandaController extends Controller
{
    public function index()
    {
        return view('dosen.beranda.index',[
            'kelompoks' => Kelompok::where('dosen_id', Auth::guard('dosen')->user()->id)->get()
        ]);
    }

    

    // public function kegiatan()
    // {
    //     $dosenId = Auth::guard('dosen')->user()->id;
    //     $kelompoks = Kelompok::where('dosen_id', $dosenId)->get();
    //     $userIds = [];
    //     foreach ($kelompoks as $kelompok) {
    //         $userIds[] = $kelompok->user_id;
    //     }

    //     $kegiatans = Kegiatan::whereIn('user_id', $userIds)->get();

    //     return view('dosen.beranda.kegiatan.index', [
    //         'kelompoks' => $kelompoks,
    //         'Kegiatans' =>  $kegiatans,
    //     ]);
    // }

    // public function kegiatanShow(User $user)
    // {
    //     $kegiatans = $user->kegiatans;
    //     return view('dosen.beranda.kegiatan.show', compact('kegiatans', 'user'));
    // }
    // public function proyek()
    // {
    //     $dosenId = Auth::guard('dosen')->user()->id;
    //     $kelompoks = Kelompok::where('dosen_id', $dosenId)->get();
    //     $userIds = [];
    //     foreach ($kelompoks as $kelompok) {
    //         $userIds[] = $kelompok->user_id;
    //     }

    //     $proyeks = Proyek::whereIn('user_id', $userIds)->get();

    //     return view('dosen.beranda.kegiatan.index', [
    //         'kelompoks' => $kelompoks,
    //         'proyeks' =>  $proyeks,
    //     ]);
    // }
    
}
