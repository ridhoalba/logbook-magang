<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials =  $request->validate([
            'nim' => ['required', 'string', 'regex:/^[A-Z]\d{8}$/'],
            'password' => 'required'
        ]); 
        
        if(Auth::attempt($credentials)) {
           $request->session()->regenerate();
           return redirect()->intended('/'); 
        }

        return back()->with('loginError', 'Login Anda Salah!');
        
    }

    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/login');
    }
    
    public function showResetPassword()
    {
        return view('login.reset',[
            'active' => ''
        ]);
    }


    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = $request->user();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/')->with('success', 'Password berhasil direset.');
    }

    // login Dospem

    public function dospem()
    {
        return view('login.dospem');
    }

    public function authDospem(Request $request)
    {
        $credentials = $request->validate([
            'nip' => ['required', 'string', 'regex:/^\d{18}$/'], // Sesuaikan pola regex dengan panjang NIP yang diinginkan
            'password' => 'required'
        ]); 
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dospem/beranda'); 
        }
        
        return back()->with('loginError', 'Login Anda Salah!');
    }

    public function logoutDospem()
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/login');
    }
}
