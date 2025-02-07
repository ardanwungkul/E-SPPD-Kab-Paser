<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:Daftar Desa', ['only' => ['index']]);
        $this->middleware('permission:Tambah Desa', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Desa', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Desa', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Desa::all();
        return view('master.desa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('master.desa.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kecamatan_id' => 'required',
            'kode_pos' => 'required',
        ]);
        $desa = new Desa();
        $desa->nama = $request->nama;
        $desa->kode_pos = $request->kode_pos;
        $desa->kecamatan_id = $request->kecamatan_id;
        $desa->save();
        return redirect()->route('desa.index')->with(['success' => 'Berhasil Menambahkan Desa']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desa $desa)
    {
        $kecamatan = Kecamatan::all();
        return view('master.desa.edit', compact('desa', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desa $desa)
    {
        $request->validate([
            'nama' => 'required',
            'kecamatan_id' => 'required',
            'kode_pos' => 'required',
        ]);
        $desa->nama = $request->nama;
        $desa->kode_pos = $request->kode_pos;
        $desa->kecamatan_id = $request->kecamatan_id;
        $desa->save();
        return redirect()->route('desa.index')->with(['success' => 'Berhasil Mengubah Desa']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desa $desa)
    {
        $desa->delete();
        return redirect()->route('desa.index')->with(['success' => 'Berhasil Menghapus Desa']);
    }
}
