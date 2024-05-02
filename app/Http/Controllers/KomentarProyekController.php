<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarProyek;

class KomentarProyekController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        // dd($request->kegiatan_id);
        $validatedData = $request->validate([
            'komentar' => 'required|string'
        ]);

        $validatedData["id_proyek"] = $request->id_proyek;

        // Simpan komentar ke database
        KomentarProyek::create($validatedData);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Catatan berhasil ditambahkan');
    }
}
