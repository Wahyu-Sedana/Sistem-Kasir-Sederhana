<?php

namespace App\Http\Controllers;

class KasirController extends Controller
{
    public function index(){
        return view('dashboard/kasir/index');
    }
}
