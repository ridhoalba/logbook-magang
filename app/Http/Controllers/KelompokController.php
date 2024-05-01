<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelompokRequest;
use App\Models\User;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateKelompokRequest;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;
        
        $kelompoks = Kelompok::whereHas('users', function($query) use ($userId) {
            $query->where('id', $userId);
        })->get();

        $users = User::all();

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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelompokRequest $request)
    {
        // Membuat kelompok baru
        $kelompok = Kelompok::create($request->validated());

        // Menyimpan anggota kelompok yang dipilih
        $selectedUsers = $request->input('user_id', []);
        foreach ($selectedUsers as $userId) {
            $user = User::findOrFail($userId);
            $user->kelompok_id = $kelompok->id;
            $user->save();
        }

        // Kembalikan ke halaman beranda
        return redirect('/beranda/kelompok')->with('success', 'Kelompok magang berhasil dibuat.');
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelompokRequest $request, Kelompok $kelompok)
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
