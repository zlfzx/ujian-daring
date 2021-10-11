<?php

namespace App\Http\Controllers\Admin\Soal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Soal\StoreSoalRequest;
use App\Models\Soal;
use App\Models\SoalPilihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.soal.index');
    }

    public function datatable(Request $request)
    {
        return DataTables::of(Soal::where('paket_soal_id', $request->paket_soal_id))
            ->addIndexColumn()
            ->rawColumns(['pertanyaan'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.soal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSoalRequest $request)
    {
        DB::beginTransaction();
        try {
            $soal = new Soal;
            $soal->paket_soal_id = $request->paket_soal_id;
            $soal->jenis = $request->jenis;
            $soal->pertanyaan = $request->pertanyaan;

            if ($request->hasFile('media')) {
                $media = $request->file('media');
                $uploadedFile = $media->store('media', 'public');
                $soal->media = $uploadedFile;
            }

            $soal->save();

            foreach ($request->soal_pilihan as $key => $pilihan) {
                $soalPilihan = new SoalPilihan;
                $soalPilihan->soal_id = $soal->id;
                $soalPilihan->jawaban = $pilihan['jawaban'];
                $soalPilihan->status = $key == $request->jawaban ? 1 : 0;
                $soalPilihan->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => FALSE,
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'status' => TRUE,
            'data' => $soal
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
