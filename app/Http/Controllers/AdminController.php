<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard/admin/index');
    }

    public function user(){
        $data = array(
            'users' => User::all(),
        );
        return view('dashboard/admin/data/user', $data)->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function createUser(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('/user')->with('success', 'Data berhasil di tambahkan');
    }

    public function barang(){
        return view('dashboard/admin/data/barang');
    }

    public function jenisbarang(){
        return view('dashboard/admin/data/jenisbarang');
    }

}
