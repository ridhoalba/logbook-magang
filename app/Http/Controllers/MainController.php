<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Proyek;
use App\Models\Kegiatan;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(Request $request)
    {
        // Ambil ID pengguna yang saat ini sedang login
        $userId = auth()->user()->id;

        // Ambil data kegiatan dan proyek dari database
        $kegiatans = Kegiatan::where('user_id', $userId)->get();
        $proyeks = Proyek::where('user_id', $userId)->get();
        $kelompoks = Kelompok::whereHas('users', function($query) use ($userId) {
            $query->where('id', $userId);
        })->get();

// Mengambil proyek-proyek bersama yang termasuk pengguna yang sedang login
        $proyek_bersama = Proyek::whereHas('mentions', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        // Menyaring proyek-proyek yang tidak termasuk dalam proyek bersama
        $proyeks = $proyeks->reject(function ($proyek) use ($proyek_bersama) {
            return $proyek_bersama->contains('id', $proyek->id);
        });

        // Ubah format tanggal untuk setiap kegiatan dan proyek menggunakan Carbon
        foreach ($kegiatans as $kegiatan) {
            $kegiatan->tanggal = Carbon::createFromFormat('Y-m-d', $kegiatan->tanggal)->format('d F Y');
        }

        foreach ($proyeks as $proyek) {
            $proyek->tanggal_mulai = Carbon::createFromFormat('Y-m-d', $proyek->tanggal_mulai)->format('d F Y');
            $proyek->tanggal_selesai = Carbon::createFromFormat('Y-m-d', $proyek->tanggal_selesai)->format('d F Y');
        }

        foreach ($proyek_bersama as $proyek) {
            $proyek->tanggal_mulai = Carbon::createFromFormat('Y-m-d', $proyek->tanggal_mulai)->format('d F Y');
            $proyek->tanggal_selesai = Carbon::createFromFormat('Y-m-d', $proyek->tanggal_selesai)->format('d F Y');
        }

        // Kirim data ke view
        return view('index', [
            'active' => 'beranda',
            'kegiatans' => $kegiatans,
            'proyeks' => $proyeks,
            'proyek_bersama' => $proyek_bersama,
            'kelompoks' => $kelompoks
        ]);
    }
}
