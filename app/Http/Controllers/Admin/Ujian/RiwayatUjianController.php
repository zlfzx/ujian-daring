<?php

namespace App\Http\Controllers\Admin\Ujian;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use App\Models\UjianHasil;
use App\Models\UjianSiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatUjianController extends Controller
{

    public function index()
    {
        return view('admin.ujian.riwayat');
    }

    public function dataTable()
    {
        $data = Ujian::with('rombel:id,nama', 'paketSoal:id,nama')->has('ujianSiswa');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('opsi', function ($data) {

                return '<a href="' . route('ujian.riwayat.show', $data->id) . '" class="btn btn-xs btn-primary">Hasil</a>';
            })
            ->rawColumns(['opsi'])
            ->make(true);
    }

    public function show(Ujian $ujian)
    {
        if (request()->ajax()) {
            $data = UjianSiswa::with('siswa')->where('ujian_id', $ujian->id);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('nilai', function ($data) {
                    return $data->nilai ?? 0;
                })
                ->addColumn('opsi', function ($data) {

                    return '<button class="btn btn-xs btn-primary btn-hasil" data-id="'.$data->id.'">Hasil</button>';
                })
                ->rawColumns(['opsi'])
                ->make(true);
        }

        return view('admin.ujian.hasil', compact('ujian'));
    }

    public function hasilUjian(Request $request)
    {
        $hasil = UjianHasil::with('soal.pilihan')->where('ujian_siswa_id', $request->id);

        return DataTables::of($hasil)
            ->addIndexColumn()
            ->editColumn('jawaban', function ($data) {
                if ($data->soal->jenis == 'pilihan_ganda') {
                    $jawaban = $data->soal->pilihan->find($data->jawaban);

                    return $jawaban->jawaban ?? '-';
                }

                return $data->jawaban ?? '-';
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return '<span class="badge badge-danger">Salah</span>';
                }

                return '<span class="badge badge-success">Benar</span>';
            })
            ->rawColumns(['soal.pertanyaan', 'jawaban', 'status'])
            ->make(true);
    }
}
