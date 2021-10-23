<?php

namespace App\Http\Controllers\Admin\Ujian;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ujian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $ujian = new Ujian;
        $ujian->paket_soal_id = $request->paket_soal_id;
        $ujian->rombel_id = $request->rombel_id;
        $ujian->nama = $request->nama;
        $ujian->keterangan = $request->keterangan;
        $ujian->waktu_mulai = Carbon::parse($request->waktu_mulai)->toDateTime();
        $ujian->durasi = $request->durasi;
        $ujian->tampil_hasil = $request->tampil_hasil;
        $ujian->detail_hasil = $request->detail_hasil;

        if ($request->has('token')) {
            $ujian->token = strtoupper(Str::random(6));
        }

        $ujian->save();

        return response()->json([
            'status' => TRUE,
            'data' => $ujian
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
