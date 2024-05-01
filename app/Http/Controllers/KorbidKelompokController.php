<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class KorbidKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelompoks = Kelompok::all();
        return view('dosen.beranda.kelompok.index',[
            'kelompoks' => $kelompoks
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
    public function show(Kelompok $kelompok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelompok $kelompok)
    {
        $dosens = Dosen::all();
        return view('dosen.beranda.kelompok.edit', [
            'kelompok' => $kelompok,
            'dosens' => $dosens
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelompok $kelompok)
    {
        $validatedData = $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            // Validate other fields if needed
        ]);
    
        $kelompok->update([
            'dosen_id' => $validatedData['dosen_id'],
            // Update other fields if needed
        ]);
    
        return redirect('/dosen/beranda/kelompok')->with('success', 'Pembimbing kelompok berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelompok $kelompok)
    {
        //
    }
}
