<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function kategori()
    {
        return view('dosen.beranda.kategori');
    }
    public function kegiatan()
    {
        $kelompoks = Kelompok::all();

        // Mengumpulkan user_id dari semua kelompok
        $userIds = [];
        foreach ($kelompoks as $kelompok) {
            $userIds[] = $kelompok->user_id;
        }

        // Mengambil kegiatan berdasarkan user_id yang ada di dalam kelompok
        $kegiatans = Kegiatan::whereIn('user_id', $userIds)->get();

        return view('dosen.beranda.kegiatan.monitor', [
            'kelompoks' => $kelompoks,
            'kegiatans' =>  $kegiatans,
        ]);
    }
    public function proyek()
    {
        $kelompoks = Kelompok::all();

        // Mengumpulkan user_id dari semua kelompok
        $userIds = [];
        foreach ($kelompoks as $kelompok) {
            $userIds[] = $kelompok->user_id;
        }

        // Mengambil proyek berdasarkan user_id yang ada di dalam kelompok
        $proyeks = Proyek::whereIn('user_id', $userIds)->get();

        return view('dosen.beranda.proyek.monitor', [
            'kelompoks' => $kelompoks,
            'proyeks' => $proyeks,
        ]);
    }

    public function MonitorKegiatanShow(User $user)
    {
        $kegiatans = Kegiatan::where('user_id', $user->id)->get();
        return view('dosen.beranda.kegiatan.mon', compact('kegiatans', 'user'));
    }

    public function MonitorProyekShow(User $user)
    {   
        // Ambil ID pengguna yang saat ini sedang login
        $userId = $user->id;

        // Ambil data kegiatan dan proyek dari database
        $proyeks = Proyek::where('user_id', $userId)->get();
        $kelompoks = Kelompok::whereHas('users', function($query) use ($userId) {
            $query->where('id', $userId);
        })->get();
        

// Mengambil proyek-proyek bersama yang termasuk pengguna yang sedang login
        $proyek_bersama = Proyek::whereHas('mentionsP', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        // Menyaring proyek-proyek yang tidak termasuk dalam proyek bersama
        $proyeks = $proyeks->reject(function ($proyek) use ($proyek_bersama) {
            return $proyek_bersama->contains('id', $proyek->id);
        });

        foreach ($proyeks as $proyek) {
            $proyek->tanggal_mulai = Carbon::createFromFormat('Y-m-d', $proyek->tanggal_mulai)->format('d F Y');
            $proyek->tanggal_selesai = Carbon::createFromFormat('Y-m-d', $proyek->tanggal_selesai)->format('d F Y');
        }

        foreach ($proyek_bersama as $proyek) {
            $proyek->tanggal_mulai = Carbon::createFromFormat('Y-m-d', $proyek->tanggal_mulai)->format('d F Y');
            $proyek->tanggal_selesai = Carbon::createFromFormat('Y-m-d', $proyek->tanggal_selesai)->format('d F Y');
        }

        // Kirim data ke view
        return view('dosen.beranda.proyek.mon', [
            'proyeks' => $proyeks,
            'proyek_bersama' => $proyek_bersama,
            'kelompoks' => $kelompoks,
            'user' => $user
        ]);
        // $proyeks = Proyek::where('user_id', $user->id)->get();
        // return view('dosen.beranda.proyek.show', compact('proyeks', 'user'));
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
