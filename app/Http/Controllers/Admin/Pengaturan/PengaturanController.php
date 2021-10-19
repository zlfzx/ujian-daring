<?php

namespace App\Http\Controllers\Admin\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        return view('admin.pengaturan.index');
    }

    public function update(Request $request)
    {
        $pengaturan = Pengaturan::first();
        $pengaturan->nama_institusi = $request->nama_institusi;
        $pengaturan->tagline = $request->tagline;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $savedLogo = $logo->store('logo', 'public');
            $pengaturan->logo = $savedLogo;
        }

        $pengaturan->save();

        return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil disimpan');
    }

    public function updateSlug(Request $request)
    {
        $pengaturan = Pengaturan::first();
        $pengaturan->slug_admin = $request->slug_admin;
        $pengaturan->save();

        return redirect($request->slug_admin . '/pengaturan');
    }
}
