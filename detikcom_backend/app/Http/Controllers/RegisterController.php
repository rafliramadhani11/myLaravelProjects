<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Registration '
        ]);
    }

    public function store (RegisterRequest $request)
    {
        $rules = $request->all();
        $rules['password'] = Hash::make($request->password);

        User::create($rules);
        return redirect('/login')->with('success', 'Berhasil Mendaftar , Silahkan Login');
    }
}
