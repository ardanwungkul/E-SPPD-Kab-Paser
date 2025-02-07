<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Pangkat/Golongan', ['only' => ['index']]);
        $this->middleware('permission:Tambah Pangkat/Golongan', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Pangkat/Golongan', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Pangkat/Golongan', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Golongan::orderBy('jenis_pegawai', 'asc')->orderBy('kode_golongan', 'asc')
            ->get();

        return view('master.golongan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'uraian' => 'required',
            'kode_golongan' => 'required',
            'jenis_pegawai' => 'required',
        ]);
        $golongan = new Golongan();
        $golongan->uraian = $request->uraian;
        $golongan->kode_golongan = $request->kode_golongan;
        $golongan->jenis_pegawai = $request->jenis_pegawai;
        $golongan->save();
        return redirect()->route('golongan.index')->with(['success' => 'Berhasil Menambahkan Golongan']);
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
    public function edit(Golongan $golongan)
    {
        return view('master.golongan.edit', compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Golongan $golongan)
    {
        $request->validate([
            'uraian' => 'required',
            'kode_golongan' => 'required',
            'jenis_pegawai' => 'required',
        ]);
        $golongan->uraian = $request->uraian;
        $golongan->kode_golongan = $request->kode_golongan;
        $golongan->jenis_pegawai = $request->jenis_pegawai;
        $golongan->save();
        return redirect()->route('golongan.index')->with(['success' => 'Berhasil Mengubah Golongan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Golongan $golongan)
    {
        $golongan->delete();
        return redirect()->route('golongan.index')->with(['success' => 'Berhasil Menghapus Golongan']);
    }
}
