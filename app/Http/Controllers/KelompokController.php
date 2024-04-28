<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreKelompokRequest;
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

        return view('dospem.beranda.index', [
            'active' => 'dospem',
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
    public function store(StoreKelompokRequest $request)
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
        //
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
