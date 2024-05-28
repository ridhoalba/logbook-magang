<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\KomentarKegiatan;
use Illuminate\Support\Facades\Auth;

class AcceptKegiatan extends Controller
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

        $kegiatans = Kegiatan::whereIn('user_id', $userIds)->get();

        return view('dosen.beranda.kegiatan.index', [
            'kelompoks' => $kelompoks,
            'Kegiatans' =>  $kegiatans,
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
    public function show(Kegiatan $kegiatan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $komentarKegiatan = KomentarKegiatan::where('kegiatan_id', $kegiatan->id)->latest()->first();
        return view('dosen.beranda.kegiatan.edit', [
            'kegiatan' => $kegiatan,
            'komentarKegiatan' => $komentarKegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $rules = [
            'accept' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Kegiatan::where('id', $kegiatan->id)->update($validatedData);

        return redirect('/dosen/beranda/kegiatan/')->with('success', 'Berhasil mengubah status');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }

    public function kegiatanShow(User $user)
    {
        $kegiatans = Kegiatan::where('user_id', $user->id)->get();
        return view('dosen.beranda.kegiatan.show', compact('kegiatans', 'user'));
    }

    public function updateStatus(Request $request)
    {
        $kegiatanIds = $request->input('kegiatan_ids');
        $status = $request->input('status'); // Menerima status dari input form

        if ($kegiatanIds) {
            Kegiatan::whereIn('id', $kegiatanIds)->update(['accept' => $status]);
        }

        return redirect()->back()->with('success', 'Status kegiatan berhasil diperbarui.');
    }


    
}
