<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::all();
        return view('master.jabatan.index', compact('data'));
    }
    public function create()
    {
        return view('master.jabatan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'uraian' => 'required'
        ]);

        $jabatan = new Jabatan();
        $jabatan->uraian = $request->uraian;
        $jabatan->ttd_default = $request->has('ttd_default') && $request->ttd_default == 'on' ? 'Y' : 'N';
        $jabatan->save();
        return redirect()->route('jabatan.index')->with(['success' => 'Berhasil Menambahkan Jabatan']);
    }
    public function edit(Jabatan $jabatan)
    {
        return view('master.jabatan.edit', compact('jabatan'));
    }
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'uraian' => 'required'
        ]);

        $jabatan->uraian = $request->uraian;
        $jabatan->ttd_default = $request->has('ttd_default') && $request->ttd_default == 'on' ? 'Y' : 'N';
        $jabatan->save();
        return redirect()->route('jabatan.index')->with(['success' => 'Berhasil Mengubah Jabatan']);
    }
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with(['success' => 'Berhasil Menghapus Jabatan']);
    }
}
