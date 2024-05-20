<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class DaftarKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $users = User::all();
        
        $kelompoks = Kelompok::whereHas('users', function($query) use ($userId) {
            $query->where('id', $userId);
        })->get();


        return view('beranda.kelompok.index', [
            'active' => 'daftar',
            'kelompoks' => $kelompoks,
            'users' => $users
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
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);
    
        // Tambahkan kelompok baru
        $kelompok = Kelompok::create([
            'nama' => $validatedData['nama'],
            // Tambahkan kolom lain sesuai kebutuhan
        ]);
    
        // Perbarui kelompok_id untuk pengguna yang dipilih
        $selectedUsers = $request->input('selected_users');
        User::whereIn('id', $selectedUsers)->update(['kelompok_id' => $kelompok->id]);
        // Perbarui kelompok_id untuk pengguna yang membuat kelompok
        $userId = auth()->user()->id;
        User::where('id', $userId)->update(['kelompok_id' => $kelompok->id]);

        return redirect('/beranda/kelompok')->with('success', 'Berhasil mendaftar !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelompok $kelompok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelompok $kelompok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelompok $kelompok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelompok $kelompok)
    {
        //
    }
}
