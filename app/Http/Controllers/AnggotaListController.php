<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use DataTables;
use Illuminate\Http\Request;

class AnggotaListController extends Controller
{
   public function AnggotaList(Request $request)
{
    if ($request->ajax()) {
        $data = Anggota::latest()->get();

        $data->transform(function ($item) {
            $item->foto = asset('storage/uploads/' . $item->foto);
            return $item;
        });

        return DataTables::of($data)->make(true);
    }

    return view('Admin/dataanggota');
}

}
