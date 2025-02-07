<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Pegawai;
use App\Models\TingkatPerjalananDinas;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Pegawai', ['only' => ['index']]);
        $this->middleware('permission:Tambah Pegawai', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Pegawai', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Pegawai', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::all();
        return view('master.pegawai.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $golongan = Golongan::all();
        $tingkat = TingkatPerjalananDinas::all();
        return view('master.pegawai.create', compact('golongan', 'tingkat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'golongan_id' => 'required',
            'tingkat_id' => 'required',
            'jabatan' => 'required',
            'jenis_pegawai' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
        $pegawai = new Pegawai();
        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->golongan_id = $request->golongan_id;
        $pegawai->tingkat_id = $request->tingkat_id;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->jenis_pegawai = $request->jenis_pegawai;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->alamat = $request->alamat;
        $pegawai->save();
        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Menambahkan Pegawai']);
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
    public function edit(Pegawai $pegawai)
    {
        $golongan = Golongan::all();
        $tingkat = TingkatPerjalananDinas::all();
        return view('master.pegawai.edit', compact('pegawai', 'golongan', 'tingkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'golongan_id' => 'required',
            'tingkat_id' => 'required',
            'jabatan' => 'required',
            'jenis_pegawai' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->golongan_id = $request->golongan_id;
        $pegawai->tingkat_id = $request->tingkat_id;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->jenis_pegawai = $request->jenis_pegawai;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->alamat = $request->alamat;
        $pegawai->save();
        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Mengubah Pegawai']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Menghapus Pegawai']);
    }
}
