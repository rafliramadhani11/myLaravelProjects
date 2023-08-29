<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // VALIDASI FORM
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // JIKA TIDAK ADA TOKEN DARI USER YANG LOGIN
        if(!$token = auth()->attempt($request->only('email', 'password'))){
            return response(null, 401);
        }

        // JIKA ADA TAMPILKAN TOKEN
        return response()->json(compact('token'));
    }
}
