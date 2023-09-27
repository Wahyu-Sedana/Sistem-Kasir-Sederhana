<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('index');
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infoLogin)){
            if(Auth::user()->role == 'admin'){
                return redirect('home');
            } elseif(Auth::user()->role == 'kasir'){
                return redirect('home');
            }
        }else {
            return redirect('')->withErrors('Username dan password yang di massukan tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }

}