<?php

namespace App\Http\Controllers;

use App\Models\JenisPerjalanan;
use Illuminate\Http\Request;

class JenisPerjalananController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Jenis SPPD', ['only' => ['index']]);
        $this->middleware('permission:Tambah Jenis SPPD', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Jenis SPPD', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Jenis SPPD', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JenisPerjalanan::all();
        return view('master.jenis-perjalanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.jenis-perjalanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'uraian' => 'required',
            'wilayah' => 'required',
        ]);
        $jenis = new JenisPerjalanan();
        $jenis->uraian = $request->uraian;
        $jenis->wilayah = $request->wilayah;
        $jenis->save();
        return redirect()->route('jenis-perjalanan.index')->with(['success' => 'Berhasil Menambahkan Jenis Perjalanan']);
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
    public function edit(JenisPerjalanan $jenis_perjalanan)
    {
        return view('master.jenis-perjalanan.edit', compact('jenis_perjalanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPerjalanan $jenis_perjalanan)
    {
        $request->validate([
            'uraian' => 'required',
            'wilayah' => 'required',
        ]);
        $jenis_perjalanan->uraian = $request->uraian;
        $jenis_perjalanan->wilayah = $request->wilayah;
        $jenis_perjalanan->save();
        return redirect()->route('jenis-perjalanan.index')->with(['success' => 'Berhasil Mengubah Jenis Perjalanan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPerjalanan $jenis_perjalanan)
    {
        $jenis_perjalanan->delete();
        return redirect()->route('jenis-perjalanan.index')->with(['success' => 'Berhasil Menghapus Jenis Perjalanan']);
    }
}
