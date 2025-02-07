<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Kegiatan', ['only' => ['index']]);
        $this->middleware('permission:Tambah Kegiatan', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Kegiatan', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Kegiatan', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Program::where('tahun', session('tahun'))->orderBy('kode', 'asc')->get();
        return view('master.kegiatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = Program::where('tahun', session('tahun'))->orderBy('kode', 'asc')->get();
        return view('master.kegiatan.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'program_kode' => 'required',
            'uraian' => 'required',
        ]);
        $kegiatan = new Kegiatan();
        $kegiatan->kode = $request->kode;
        $kegiatan->program_kode = $request->program_kode;
        $kegiatan->uraian = $request->uraian;
        $kegiatan->tahun = session('tahun');
        $kegiatan->save();
        return redirect()->route('kegiatan.index')->with(['success' => 'Berhasil Menambahkan Kegiatan']);
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
    public function edit(Kegiatan $kegiatan)
    {
        $program = Program::where('tahun', session('tahun'))->orderBy('kode', 'asc')->get();
        return view('master.kegiatan.edit', compact('program', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'kode' => 'required',
            'program_kode' => 'required',
            'uraian' => 'required',
        ]);
        $kegiatan->kode = $request->kode;
        $kegiatan->program_kode = $request->program_kode;
        $kegiatan->uraian = $request->uraian;
        $kegiatan->tahun = session('tahun');
        $kegiatan->save();
        return redirect()->route('kegiatan.index')->with(['success' => 'Berhasil Mengubah Kegiatan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with(['success' => 'Berhasil Menghapus Kegiatan']);
    }

    public function getKegiatanByProgram(Request $request)
    {
        $request->validate([
            'program_kode' => 'required|string',
        ]);
        $programKode = $request->input('program_kode');
        $kegiatan = Kegiatan::where('program_kode', $programKode)->get();
        return response()->json($kegiatan);
    }
}
