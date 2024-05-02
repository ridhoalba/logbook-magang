<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarKegiatan;

class KomentarKegiatanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        // dd($request->kegiatan_id);
        $validatedData = $request->validate([
            'komentar' => 'required|string'
        ]);

        $validatedData["kegiatan_id"] = $request->kegiatan_id;

        // Simpan komentar ke database
        KomentarKegiatan::create($validatedData);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Catatan berhasil ditambahkan');
    }
}
