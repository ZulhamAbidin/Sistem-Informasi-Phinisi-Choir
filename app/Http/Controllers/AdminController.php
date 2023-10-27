<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Implementasi aksi yang akan dijalankan ketika pengguna dengan role 'admin' mengakses rute ini.
        return view('admin.index');
    }
}
