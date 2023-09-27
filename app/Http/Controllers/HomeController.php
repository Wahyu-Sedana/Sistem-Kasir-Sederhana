<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard/admin/index');
    }

    public function kasir(){
        return view('dashboard/kasir/index');
    }
}
