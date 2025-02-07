<?php

namespace App\Http\Controllers;

use App\Models\TingkatPerjalananDinas;
use Illuminate\Http\Request;

class TingkatPerjalananDinasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Tingkat Perjalanan Dinas', ['only' => ['index']]);
        $this->middleware('permission:Tambah Tingkat Perjalanan Dinas', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Tingkat Perjalanan Dinas', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Tingkat Perjalanan Dinas', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TingkatPerjalananDinas::OrderBy('tingkat_sppd', 'asc')->get();
        return view('master.tingkat-perjalanan-dinas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.tingkat-perjalanan-dinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tingkat_sppd' => 'required',
            'uraian' => 'required',
            'keterangan' => 'required'
        ]);
        $tingkat_perjalanan_dinas = new TingkatPerjalananDinas();
        $tingkat_perjalanan_dinas->tingkat_sppd = $request->tingkat_sppd;
        $tingkat_perjalanan_dinas->uraian = $request->uraian;
        $tingkat_perjalanan_dinas->keterangan = $request->keterangan;
        $tingkat_perjalanan_dinas->save();
        return redirect()->route('tingkat-perjalanan-dinas.index')->with(['success' => 'Berhasil Menambahkan Tingkat Perjalanan Dinas']);
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
    public function edit(TingkatPerjalananDinas $tingkat_perjalanan_dinas)
    {
        return view('master.tingkat-perjalanan-dinas.edit', compact('tingkat_perjalanan_dinas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TingkatPerjalananDinas $tingkat_perjalanan_dinas)
    {
        $request->validate([
            'tingkat_sppd' => 'required',
            'uraian' => 'required',
            'keterangan' => 'required'
        ]);
        $tingkat_perjalanan_dinas->tingkat_sppd = $request->tingkat_sppd;
        $tingkat_perjalanan_dinas->uraian = $request->uraian;
        $tingkat_perjalanan_dinas->keterangan = $request->keterangan;
        $tingkat_perjalanan_dinas->save();
        return redirect()->route('tingkat-perjalanan-dinas.index')->with(['success' => 'Berhasil Mengubah Tingkat Perjalanan Dinas']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TingkatPerjalananDinas $tingkat_perjalanan_dinas)
    {
        $tingkat_perjalanan_dinas->delete();
        return redirect()->route('tingkat-perjalanan-dinas.index')->with(['success' => 'Berhasil Menghapus Tingkat Perjalanan Dinas']);
    }
}
