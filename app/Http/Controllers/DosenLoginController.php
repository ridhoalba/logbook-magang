<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Dosen;

class DosenLoginController extends Controller
{
    public function index() 
    {
        return view('dosen.login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nip' => ['required', 'string'], // Sesuaikan dengan aturan validasi NIP yang sesuai
            'password' => 'required'
        ]); 
        
        if (Auth::guard('dosen')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dosen'); // Sesuaikan dengan redirect setelah login
        }
        
        throw ValidationException::withMessages([
            'nip' => ['Kombinasi NIP dan password tidak valid.'],
        ]);
    }

    public function logout()
    {
        Auth::guard('dosen')->logout();

        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/dosen/login');
    }

    // reset password 
    public function showResetPassword()
    {
        return view('dosen.login.reset',[
            'active' => ''
        ]);
    }


    // public function reset(Request $request)
    // {
    //     $request->validate([
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);
    
    //     // Mengambil objek Dosen yang sedang diautentikasi
    //     $dosen = auth()->guard('dosen')->user();
    
    //     // Memastikan objek Dosen tidak null

    //     $dosen->password = Hash::make($request->password);
    //     $dosen->save();
    //     return redirect('/dosen/password/reset')->with('success', 'Password berhasil direset.');

    // }
}
