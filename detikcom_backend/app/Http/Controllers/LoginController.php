<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index ()
    {
        return view('auth.login',[
            'title' => 'Login Page'
        ]);
    }

    public function auth (Request $request)
    {
        $rules = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($rules))
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('failedLogin', 'Sesuatu ada yang salah saat kamu mengisi input');
    }

    public function logout (Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
