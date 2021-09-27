<?php

namespace App\Http\Controllers\Admin\Mapel;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mapel.index');
    }

    public function dataTable()
    {
        return DataTables::of(Mapel::query())
            ->addIndexColumn()
            ->addColumn('opsi', function ($data) {
                return '<button class="btn btn-xs btn-outline-warning btn-edit" data-id="'.$data->id.'" data-kode="'.$data->kode.'" data-nama="'.$data->nama.'"><i class="fas fa-edit"></i> Edit</button>
                <button class="btn btn-xs btn-outline-danger btn-hapus" data-id="'.$data->id.'"><i class="fas fa-trash"></i> Hapus</button>';
            })
            ->rawColumns(['opsi'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = Mapel::create($request->all());

        return response()->json([
            'status' => TRUE,
            'data' => $mapel
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        return response()->json([
            'status' => TRUE,
            'data' => $mapel
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
        $mapel = Mapel::where('id', $id)->update($request->except('_method'));

        return response()->json([
            'status' => TRUE,
            'data' => $mapel
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return response()->json([
            'status' => TRUE
        ], 200);
    }
}
