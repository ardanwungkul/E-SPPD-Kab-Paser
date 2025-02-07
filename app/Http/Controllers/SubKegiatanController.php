<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;

class SubKegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Sub Kegiatan', ['only' => ['index']]);
        $this->middleware('permission:Tambah Sub Kegiatan', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Sub Kegiatan', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Sub Kegiatan', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Program::where('tahun', session('tahun'))->orderBy('kode', 'asc')->get();
        return view('master.sub-kegiatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = Program::where('tahun', session('tahun'))->orderBy('kode', 'asc')->get();
        return view('master.sub-kegiatan.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'program_kode' => 'required',
            'kegiatan_id' => 'required',
            'uraian' => 'required',
        ]);
        $sub_kegiatan = new SubKegiatan();
        $sub_kegiatan->kode = $request->kode;
        $sub_kegiatan->kegiatan_id = $request->kegiatan_id;
        $sub_kegiatan->uraian = $request->uraian;
        $sub_kegiatan->tahun = session('tahun');
        $sub_kegiatan->save();
        return redirect()->route('sub-kegiatan.index')->with(['success' => 'Berhasil Menambahkan Sub Kegiatan']);
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
    public function edit(SubKegiatan $sub_kegiatan)
    {
        $program = Program::where('tahun', session('tahun'))->orderBy('kode', 'asc')->get();
        return view('master.sub-kegiatan.edit', compact('sub_kegiatan', 'program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKegiatan $sub_kegiatan)
    {
        $request->validate([
            'kode' => 'required',
            'program_kode' => 'required',
            'kegiatan_id' => 'required',
            'uraian' => 'required',
        ]);
        $sub_kegiatan->kode = $request->kode;
        $sub_kegiatan->kegiatan_id = $request->kegiatan_id;
        $sub_kegiatan->uraian = $request->uraian;
        $sub_kegiatan->save();
        return redirect()->route('sub-kegiatan.index')->with(['success' => 'Berhasil Mengedit Sub Kegiatan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubKegiatan $sub_kegiatan)
    {
        $sub_kegiatan->delete();
        return redirect()->route('sub-kegiatan.index')->with(['success' => 'Berhasil Menghapus Sub Kegiatan']);
    }
}
