<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil pengguna yang berada dalam kelompok yang sama dengan pengguna yang sedang login
        $mentions = User::where('kelompok_id', auth()->user()->kelompok_id)->where('id', '!=', auth()->user()->id)->get();
        return view('beranda.proyek.index', [
            'active' => 'proyek',
            'mentions' => $mentions
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'dokumentasi' => 'required|image|file|max:1024'
        ]);

        if($request->file('dokumentasi')){
            $validatedData['dokumentasi'] = $request->file('dokumentasi')->store('dokumentasi-proyek');
        }

        $mentions = $request->input('mention', []);

// Jika tidak ada mention yang dipilih, maka kosongkan array mention
        if (empty($mentions)) {
            $mentions = [];
        }

        // Jika ada mention yang dipilih tetapi pengguna yang sedang login belum ada di dalamnya, tambahkan ID pengguna yang sedang login ke dalam array mention
        if (!empty($mentions) && !in_array(auth()->user()->id, $mentions)) {
            $mentions[] = auth()->user()->id;
        }
        $validatedData['user_id'] = auth()->user()->id;

        $proyek = Proyek::create($validatedData);

        // $proyek->user()->sync($request->input('user'));
        
        $proyek->mentions()->sync($mentions);

        return redirect('/')->with('success', 'Proyek telah ditambahkan !');
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
    {
        return view('beranda.proyek.edit', [
            'active' => 'proyek',
            'proyek' => $proyek,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyek $proyek)
    {
        $validatedData = $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'kelompok' => 'required',
            'dokumentasi' => 'required|image|file|max:1024'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if($request->file('dokumentasi')){
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['dokumentasi'] = $request->file('dokumentasi')->store('dokumentasi-proyek');
        }

        Proyek::where('id', $proyek->id)->update($validatedData);

        return redirect('/')->with('success', 'Proyek telah diubah !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyek $proyek)
    {
        if($proyek->dokumentasi) {
            Storage::delete($proyek->dokumentasi);
        }
        Proyek::destroy($proyek->id);

        return redirect('/')->with('success', 'Proyek telah dihapus !');
    }
}
