<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard/admin/index');
    }

    public function user(){
        $data = array(
            'title' => 'Admin Page',
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
        return redirect('/admin/user')->with('success', 'Data berhasil di tambahkan');
    }

    public function editUser(Request $request, $id){
        User::where('id', $id)
            ->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
        ]);
        return redirect('/admin/user')->with('success', 'Data berhasil di update');
    }

    public function deleteUser(Request $request, $id){
        $user = User::where('id', $id)->delete();
        return redirect('/admin/user')->with('success', 'Data berhasil di hapus');
    }

    public function jenisbarang(){
        $data = array(
            'title' => 'Admin Page',
            'nama_jenis' => JenisBarang::all(),
        );
        return view('dashboard/admin/data/jenisbarang', $data)->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function createjenisbarang(Request $request){
        JenisBarang::create([
            'nama_jenis' => $request->nama_jenis,
        ]);
        return redirect('/admin/jenisbarang')->with('success', 'Data berhasil di tambahkan');
    }

    public function editjenisbarang(Request $request, $id){
        JenisBarang::where('id', $id)
            ->where('id', $id)
                ->update([
                    'nama_jenis' => $request->nama_jenis,
        ]);
        return redirect('/admin/jenisbarang')->with('success', 'Data berhasil di update');
    }

    public function deletejenisbarang(Request $request, $id){
        $nama_jenis = JenisBarang::where('id', $id)->delete();
        return redirect('/admin/jenisbarang')->with('success', 'Data berhasil di hapus');
    }

    public function barang(){
        return view('dashboard/admin/data/barang');
    }

}
