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


    public function login(Request $request)
    {
     
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
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

        
        Akun::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth')->with('success', 'Registration successful');
    }
}