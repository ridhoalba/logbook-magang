<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
}
