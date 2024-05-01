<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Proyek;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\KomentarProyek;
use Illuminate\Support\Facades\Auth;

class AcceptProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosenId = Auth::guard('dosen')->user()->id;
        $kelompoks = Kelompok::where('dosen_id', $dosenId)->get();
        $userIds = [];
        foreach ($kelompoks as $kelompok) {
            $userIds[] = $kelompok->user_id;
        }

        $proyek = Proyek::whereIn('user_id', $userIds)->get();

        return view('dosen.beranda.proyek.index', [
            'kelompoks' => $kelompoks,
            'proyeks' =>  $proyek,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyek $proyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyek $proyek)
    {   $komentarProyek = KomentarProyek::where('id_proyek', $proyek->id)->latest()->first();
        return view('dosen.beranda.proyek.edit', [
            'proyek' => $proyek,
            'komentarProyek' => $komentarProyek
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyek $proyek)
    {
        $rules = [
            'accept' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Proyek::where('id', $proyek->id)->update($validatedData);

        return redirect('/dosen/beranda/proyek/' . $request->user_id)->with('success', 'Berhasil mengubah status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyek $proyek)
    {
        //
    }

    public function proyekShow(User $user)
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
        return view('dosen.beranda.proyek.show', [
            'proyeks' => $proyeks,
            'proyek_bersama' => $proyek_bersama,
            'kelompoks' => $kelompoks,
            'user' => $user
        ]);
        // $proyeks = Proyek::where('user_id', $user->id)->get();
        // return view('dosen.beranda.proyek.show', compact('proyeks', 'user'));
    }
}
