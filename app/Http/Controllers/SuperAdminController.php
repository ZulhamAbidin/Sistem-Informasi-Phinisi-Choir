<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        // Implementasi aksi yang akan dijalankan ketika pengguna dengan role 'super_admin' mengakses rute ini.
        return view('SuperAdmin.index');
    }
}
