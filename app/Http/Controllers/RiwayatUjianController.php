<?php

namespace App\Http\Controllers;

use App\Models\UjianSiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatUjianController extends Controller
{
    public function index()
    {
        return view('riwayat_ujian');
    }

    public function data()
    {
        $data = UjianSiswa::with('ujian.paketSoal.mapel')->where([
            'siswa_id' => auth()->id()
        ]);

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
