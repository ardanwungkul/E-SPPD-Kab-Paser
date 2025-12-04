<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan2;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $data = Program::where('tahun', session('tahun'))->orderBy('kdprog', 'asc')->get();
        return view('master.kegiatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = Program::where('tahun', session('tahun'))->orderBy('kdprog', 'asc')->get();
        return view('master.kegiatan.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'kode' => [
                    'required',
                    'max:15',
                    Rule::unique('ref_kegiatan2', 'kdgiat')->where(function ($query) use ($request) {
                        return $query->where('tahun', session('tahun'))->where('kdprog', $request->program_id);
                    })
                ],
                'program_id' => 'required',
                'uraian' => ['required', 'max:120',],
            ],
            [
                'uraian.max' => 'Nama Kegiatan tidak boleh lebih dari 120 karakter',
                'kode.max' => 'Maksimal Kode Yang Bisa Digunakan adalah 15 Digit',
                'kode.required' => 'Kode Wajib Diisi',
                'uraian.required' => 'Nama Kegiatan Wajib Diisi',
                'kode.unique' => 'Kode Sudah Digunakan',
            ]
        );
        $kegiatan = new Kegiatan2();
        $kegiatan->kdgiat = $request->kode;
        $kegiatan->kdprog = $request->program_id;
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
    public function edit(Kegiatan2 $kegiatan)
    {
        $program = Program::where('tahun', session('tahun'))->orderBy('kdprog', 'asc')->get();
        return view('master.kegiatan.edit', compact('program', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan2 $kegiatan)
    {
        $request->validate(
            [
                'kode' => [
                    'max:15',
                    'required',
                    Rule::unique('ref_kegiatan2', 'kdgiat')->where(function ($query) use ($request) {
                        return $query->where('tahun', session('tahun'))->where('kdprog', $request->program_id);
                    })->ignore($kegiatan->kdgiat, 'kdgiat')
                ],
                'program_id' => 'required',
                'uraian' => ['required', 'max:120',],
            ],
            [
                'uraian.max' => 'Nama Kegiatan tidak boleh lebih dari 120 karakter',
                'kode.max' => 'Maksimal Kode Yang Bisa Digunakan adalah 15 Digit',
                'kode.required' => 'Kode Wajib Diisi',
                'uraian.required' => 'Nama Kegiatan Wajib Diisi',
                'kode.unique' => 'Kode Sudah Digunakan',
            ]
        );
        $kegiatan->kdgiat = $request->kode;
        $kegiatan->kdprog = $request->program_id;
        $kegiatan->uraian = $request->uraian;
        $kegiatan->tahun = session('tahun');
        $kegiatan->save();
        return redirect()->route('kegiatan.index')->with(['success' => 'Berhasil Mengubah Kegiatan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan2 $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with(['success' => 'Berhasil Menghapus Kegiatan']);
    }

    public function getKegiatanByProgram(Request $request)
    {
        $request->validate([
            'program_id' => 'required|string',
        ]);
        $programKode = $request->input('program_id');
        $kegiatan = Kegiatan2::where('kdprog', $programKode)->get();
        return response()->json($kegiatan);
    }
}
