<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DaftarUjianController extends Controller
{

    public function index()
    {

        return view('daftar_ujian');
    }

    public function data()
    {
        $data = Ujian::with('paketSoal.mapel')->where([
            'rombel_id' => auth()->user()->rombel_id
        ])->whereDoesntHave('ujianSiswa', function ($q) {
            $q->where('siswa_id', auth()->id());
        });

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('waktu_mulai', function ($data) {
                $date = Carbon::parse($data->waktu_mulai);

                return $date->translatedFormat('l, d F Y H:i:s');
            })
            ->editColumn('durasi', function ($data) {
                return $data->durasi . ' Menit';
            })
            ->addColumn('btnMulai', function ($data) {
                $now = now()->timestamp;
                $mulai = Carbon::parse($data->waktu_mulai)->timestamp;

                if ($mulai > $now) {
                    return '<button type="button" class="btn btn-sm btn-success" disabled>Mulai</button>';
                }

                return '<button type="button" class="btn btn-sm btn-success btn-mulai" data-id="'.$data->id.'">Mulai</button>';
            })
            ->rawColumns(['btnMulai'])
            ->make(true);
    }

    public function show(Ujian $ujian) {
        $ujian->load('paketSoal');

        if ($ujian->token != null) {
            $ujian->token = true;
        }

        return response()->json($ujian);
    }
}
