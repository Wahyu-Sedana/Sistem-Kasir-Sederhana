<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        echo "hallo selamat datang di halaman admin";
        echo "<h1>" . Auth::user()-> name . "</h1>";
        echo "<a href='logout'>Logout</a>";
    }

    public function kasir(){
        echo "hallo selamat datang di halaman admin";
        echo "<h1>" . Auth::user()-> name . "</h1>";
        echo "<a href='logout'>Logout</a>";
    }
}
