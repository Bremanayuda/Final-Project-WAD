<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

    public function showAuthForm()
    {
        return view('auth.auth');
    }

    public function register(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:akun,email',
            'name' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth')
                             ->withErrors($validator)
                             ->withInput();
        }

        
        $akun =Akun::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($akun); 
        return redirect('/dashboard');
    }

    public function login(Request $request)
    {
     
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
    
