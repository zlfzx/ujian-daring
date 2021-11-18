<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ujian\MulaiUjianRequest;
use App\Models\PaketSoal;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\UjianHasil;
use App\Models\UjianSiswa;
use Illuminate\Http\Request;

class UjianController extends Controller
{

    public function index()
    {
        $ujianSiswa = UjianSiswa::with('ujian')->where([
            'siswa_id' => auth()->id(),
            'status' => 0
        ])->where('selesai', '>=', now())->first();

        if ($ujianSiswa == null) {
            return redirect()->route('daftar-ujian')->withErrors(['Tidak ada ujian Aktif']);
        }

        // dd($ujianSiswa);

        return view('ujian', compact('ujianSiswa'));
    }

    public function mulai(MulaiUjianRequest $request)
    {
        $ujian = Ujian::find($request->ujian_id);

        $ujianSiswa = new UjianSiswa;
        $ujianSiswa->ujian_id = $ujian->id;
        $ujianSiswa->siswa_id = auth()->id();
        $ujianSiswa->mulai = now();
        $ujianSiswa->selesai = now()->addMinutes($ujian->durasi);
        $ujianSiswa->user_agent = $request->userAgent();
        $ujianSiswa->save();

        // random soal
        $soal = Soal::where('paket_soal_id', $ujian->paket_soal_id)->inRandomOrder()->get();
        foreach ($soal as $key => $value) {
            $hasil = new UjianHasil;
            $hasil->ujian_siswa_id = $ujianSiswa->id;
            $hasil->soal_id = $value['id'];
            $hasil->status = 0;
            $hasil->save();
        }

        // dd($ujianSiswa);

        return redirect()->route('ujian');
    }

    public function soal(Request $request)
    {
        // $ujianSiswa = UjianSiswa::with('ujian.paketSoal')->findOrFail($request->ujian_siswa_id);
        // $soal = Soal::where('paket_soal_id', $ujianSiswa->ujian->paketSoal->id)->with('hasil')->paginate(1);

        $soal = UjianHasil::with('soal.pilihan')->where('ujian_siswa_id', $request->ujian_siswa_id)->paginate(1);

        return response()->json($soal);
    }

    public function daftarSoal(Request $request)
    {
        $soal = UjianHasil::where('ujian_siswa_id', $request->ujian_siswa_id)->get();

        return response()->json($soal);
    }

    // ragu ragu
    public function raguRagu(Request $request)
    {
        $soal = UjianHasil::findOrFail($request->id);
        $soal->ragu = $request->ragu;
        $soal->save();

        return response()->json($soal);
    }

    // simpan jawaban
    public function simpanJawaban(Request $request)
    {
        $soal = UjianHasil::with('soal.pilihanBenar')->findOrFail($request->id);
        $soal->jawaban = $request->jawaban;

        if ($soal->soal->jenis == 'pilihan_ganda') {
            if ($soal->soal->pilihanBenar->id == $soal->jawaban) {
                $soal->status = 1;
            } else {
                $soal->status = 0;
            }
        } else {
            if (strtolower($soal->soal->pilihanBenar->jawaban) == $soal->jawaban) {
                $soal->status = 1;
            } else {
                $soal->status = 0;
            }
        }

        $soal->save();

        return response()->json(true);
    }

    // selesai ujian
    public function selesai(Request $request)
    {
        $ujian = UjianSiswa::findOrFail($request->ujian_siswa_id);
        $ujian->status = 1;
        $ujian->save();

        return response()->json(true);
    }
}
