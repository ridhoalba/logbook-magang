<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\KomentarKegiatan;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('beranda.kegiatan.index', [
            'active' => 'kegiatan'
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
            'tanggal' => 'required|unique:kegiatans',
            'kegiatan' => 'required',
            'dokumentasi' => 'required|image|file|max:4096',
            'accept' => ''
        ]);

        if($request->file('dokumentasi')){
            $validatedData['dokumentasi'] = $request->file('dokumentasi')->store('dokumentasi-kegiatan');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Kegiatan::create($validatedData);

        return redirect('/')->with('success', 'Kegiatan harian telah ditambahkan !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $komentarKegiatan = KomentarKegiatan::where('kegiatan_id', $kegiatan->id)->latest()->first();
        return view('beranda.kegiatan.edit', [
            'active' => 'kegiatan',
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
            'kegiatan' => 'required',
            'dokumentasi' => 'required|image|file|max:4096',
            'accept' => ''
        ];

        if($request->tanggal != $kegiatan->tanggal) {
            $rules['tanggal'] = 'required|unique:kegiatans';
        }

        $validatedData = $request->validate($rules);

        if($request->file('dokumentasi')){
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['dokumentasi'] = $request->file('dokumentasi')->store('dokumentasi-kegiatan');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Kegiatan::where('id', $kegiatan->id)->update($validatedData);

        return redirect('/')->with('success', 'Kegiatan harian telah diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if($kegiatan->dokumentasi) {
            Storage::delete($kegiatan->dokumentasi);
        }
        
        Kegiatan::destroy($kegiatan->id);

        return redirect('/')->with('success', 'Kegiatan harian telah dihapus !');
    }
}
