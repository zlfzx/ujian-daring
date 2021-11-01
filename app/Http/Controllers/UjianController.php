<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\UjianSiswa;
use Illuminate\Http\Request;

class UjianController extends Controller
{

    public function index()
    {
        return view('ujian');
    }

    public function mulai(Request $request)
    {

        $ujian = Ujian::findOrFail($request->ujian_id);

        $ujianSiswa = new UjianSiswa
    }
}
