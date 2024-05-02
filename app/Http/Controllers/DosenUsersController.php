<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DosenUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $dosens = Dosen::all();
        $users = User::all();
        return view('dosen.beranda.users.index', [
            'users' => $users,
            'dosens' => $dosens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.beranda.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:10|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data pengguna baru ke dalam database
        $user = new User();
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect('/dosen/beranda/users')->with('success', 'Pengguna mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            // Cobalah untuk menghapus baris yang memiliki ketergantungan kunci asing
            // Misalnya:
            User::destroy($user->id);
            return redirect('/dosen/beranda/users/')->with('success', 'Pengguna mahasiswa telah dihapus');
        } catch (QueryException $e) {
            // Tangani kesalahan jika terjadi kesalahan constraint kunci asing
            if ($e->errorInfo[1] == 1451) {
                // Lakukan tindakan yang sesuai, misalnya, memberikan notifikasi gagal
                return redirect()->back()->with('error', 'Tidak dapat menghapus pengguna karena pengguna memiliki data.');
            } else {
                // Tangani jenis kesalahan lain jika diperlukan
                return redirect()->back()->with('error', 'Terjadi kesalahan yang tidak diketahui.');
            }
        }
        
        
    }

    public function destroyDosen($id)
    {
        try{
            $dosen = Dosen::findOrfail($id);
            $dosen->delete();

            return redirect('/dosen/beranda/users')->with('success', 'Pengguna dosen berhasil dihapus');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus pengguna dosen karena memiliki data');
        }
    }

    public function createDosen()
    {
        return view('dosen.beranda.users.createDosen');
    }

    public function storeDosen(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:dosens',
            'email' => 'required|string|email|max:255|unique:dosens',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data pengguna baru ke dalam database
        Dosen::create($validatedData);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect('/dosen/beranda/users')->with('success', 'Pengguna dosen berhasil ditambahkan.');
    }
}
