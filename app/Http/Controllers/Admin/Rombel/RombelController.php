<?php

namespace App\Http\Controllers\Admin\Rombel;

use App\Http\Controllers\Controller;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rombel.index');
    }

    public function dataTable()
    {
        return DataTables::of(Rombel::with('kelas'))
        ->addIndexColumn()
        ->addColumn('opsi', function ($data) {
            return '<button class="btn btn-xs btn-outline-warning btn-edit" data-id="'.$data->id.'" data-kelas-id="'.$data->kelas->id.'" data-kelas-nama="'.$data->kelas->nama.'" data-nama="'.$data->nama.'"><i class="fas fa-edit"></i> Edit</button>
                <button class="btn btn-xs btn-outline-danger btn-hapus" data-id="'.$data->id.'"><i class="fas fa-trash"></i> Hapus</button>';
        })
        ->rawColumns(['opsi'])
        ->make(true);
    }

    public function select2()
    {
        $rombel = Rombel::select('id', 'nama AS text')->get();

        return response()->json([
            'status' => TRUE,
            'results' => $rombel
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rombel = Rombel::create($request->all());

        return response()->json([
            'status' => TRUE,
            'data' => $rombel
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rombel $rombel)
    {
        $rombel->load('kelas');

        return response()->json([
            'status' => TRUE,
            'data' => $rombel
        ], 200);
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
        $rombel = Rombel::where('id', $id)->update($request->except('_method'));

        return response()->json([
            'status' => TRUE,
            'data' => $rombel
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rombel $rombel)
    {
        $rombel->delete();

        return response()->json([
            'status' => TRUE
        ], 200);
    }
}
