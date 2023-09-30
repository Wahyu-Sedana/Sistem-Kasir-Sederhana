<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JenisBarang;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Admin Page',
            'users' => User::all(),
        );
        return view('dashboard/admin/index', $data)->with('i', (request()->input('page', 1) - 1) * 10);
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
        $data = array(
            'title' => 'Admin Page',
            'jenisbarang' => JenisBarang::all(),
            'barang' => Barang::join('tb_jenis_barang', 'tb_jenis_barang.id', '=', 'tb_barang.id_jenis')
                                ->select('tb_barang.*', 'tb_jenis_barang.nama_jenis')
                                ->get()
        );
        return view('dashboard/admin/data/barang', $data)->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function createbarang(Request $request){
        Barang::create([
            'id_jenis' => $request->id_jenis,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        return redirect('/admin/barang')->with('success', 'Data berhasil di tambahkan');
    }

    public function editbarang(Request $request, $id){
        Barang::where('id', $id)
            ->where('id', $id)
                ->update([
                    'id_jenis' => $request->id_jenis,
                    'nama_barang' => $request->nama_barang,
                    'stok' => $request->stok,
                    'harga' => $request->harga,
        ]);
        return redirect('/admin/barang')->with('success', 'Data berhasil di update');
    }

    public function deletebarang(Request $request, $id){
        $nama_barang = Barang::where('id', $id)->delete();
        return redirect('/admin/barang')->with('success', 'Data berhasil di hapus');
    }

}
