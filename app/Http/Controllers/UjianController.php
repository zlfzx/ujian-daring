<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ujian\MulaiUjianRequest;
use App\Models\Ujian;
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
        // $ujianSiswa->save();

        dd($ujianSiswa);
    }
}
