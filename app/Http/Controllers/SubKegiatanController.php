<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubKegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('level:3')->except('index', 'getSubKegiatanByKegiatan');
    }
    
    public function index()
    {
        $data = Program::where('tahun', session('tahun'))->orderBy('kdprog', 'asc')->get();
        return view('master.sub-kegiatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = Program::where('tahun', session('tahun'))->orderBy('kdprog', 'asc')->get();
        return view('master.sub-kegiatan.create', compact('program'));
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
                    'max:20',
                    Rule::unique('ref_kegiatan_sub', 'kdsub')->where(function ($query) use ($request) {
                        return $query->where('tahun', session('tahun'))->where('kdgiat', $request->kdgiat);
                    })
                ],
                'program_id' => 'required',
                'kegiatan_id' => 'required',
                'uraian' => ['required', 'max:150',],
            ],
            [
                'uraian.max' => 'Nama Sub. Bidang tidak boleh lebih dari 150 karakter',
                'kode.max' => 'Maksimal Kode Yang Bisa Digunakan adalah 20 Digit',
                'program_id.required' => 'Program Wajib Diisi',
                'kegiatan_id.required' => 'Kegiatan Wajib Diisi',
                'uraian.required' => 'Nama Sub. Bidang Wajib Diisi',
                'kode.unique' => 'Kode Sudah Digunakan',
            ]
        );
        $sub_kegiatan = new SubKegiatan();
        $sub_kegiatan->kdprog = $request->program_id;
        $sub_kegiatan->kdgiat = $request->kegiatan_id;
        $sub_kegiatan->kdsub = $request->kode;
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
        $program = Program::where('tahun', session('tahun'))->orderBy('kdprog', 'asc')->get();
        return view('master.sub-kegiatan.edit', compact('sub_kegiatan', 'program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKegiatan $sub_kegiatan)
    {
        $request->validate(
            [
                'kode' => [
                    'max:20',
                    'required',
                    Rule::unique('ref_kegiatan_sub', 'kdsub')->where(function ($query) use ($request) {
                        return $query->where('tahun', session('tahun'))->where('kdgiat', $request->kegiatan_id);
                    })->ignore($sub_kegiatan->kdsub, 'kdsub')
                ],
                'program_id' => 'required',
                'kegiatan_id' => 'required',
                'uraian' => ['required', 'max:150',],
            ],
            [
                'uraian.max' => 'Nama Sub. Bidang tidak boleh lebih dari 150 karakter',
                'kode.max' => 'Maksimal Kode Yang Bisa Digunakan adalah 20 Digit',
                'program_id.required' => 'Program Wajib Diisi',
                'kegiatan_id.required' => 'Kegiatan Wajib Diisi',
                'uraian.required' => 'Nama Sub. Bidang Wajib Diisi',
                'kode.unique' => 'Kode Sudah Digunakan',
            ]
        );
        $sub_kegiatan->kdprog = $request->program_id;
        $sub_kegiatan->kdgiat = $request->kegiatan_id;
        $sub_kegiatan->kdsub = $request->kode;
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

    public function getSubKegiatanByKegiatan(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|string',
        ]);
        $sub_kegiatan = SubKegiatan::where('kdgiat', $request->kegiatan_id)->get();
        return response()->json($sub_kegiatan);
    }
}
