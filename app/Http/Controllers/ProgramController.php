<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Program', ['only' => ['index']]);
        $this->middleware('permission:Tambah Program', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Program', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Program', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Program::where('tahun', session('tahun'))->orderBy('kdprog', 'asc')->get();
        return view('master.program.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'kode' => [
                    'max:10',
                    'required',
                    Rule::unique('ref_program')->where(function ($query) use ($request) {
                        return $query->where('tahun', session('tahun'));
                    })
                ],
                'uraian' => ['required', 'max:150',],
            ],
            [
                'uraian.max' => 'Nama Program tidak boleh lebih dari 150 karakter',
                'kode.max' => 'Maksimal Kode Yang Bisa Digunakan adalah 10 Digit',
                'kode.required' => 'Kode Wajib Diisi',
                'uraian.required' => 'Nama Program Wajib Diisi',
                'kode.unique' => 'Kode Sudah Digunakan',
            ]
        );
        $program = new Program();
        $program->kdprog = $request->kode;
        $program->uraian = $request->uraian;
        $program->tahun = session('tahun');
        $program->save();
        return redirect()->route('program.index')->with(['success' => 'Berhasil Menambahkan Program']);
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
    public function edit($kdprog)
    {
        $program = Program::where('kdprog', $kdprog)->first();
        return view('master.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kdprog)
    {
        $request->validate(
            [
                'kode' =>
                [
                    'max:10',
                    'required',
                    Rule::unique('ref_program')->where(function ($query) use ($request) {
                        return $query->where('tahun', session('tahun'));
                    })->ignore($kdprog)
                ],
                'uraian' => ['required', 'max:150',],
            ],
            [
                'uraian.max' => 'Nama Program tidak boleh lebih dari 150 karakter',
                'kode.required' => 'Kode Wajib Diisi',
                'kode.max' => 'Maksimal Kode Yang Bisa Digunakan adalah 10 Digit',
                'uraian.required' => 'Nama Program Wajib Diisi',
                'kode.unique' => 'Kode Sudah Digunakan',

            ]
        );
        $program = Program::where('kdprog', $kdprog)->first();

        $program->kdprog = $request->kode;
        $program->uraian = $request->uraian;
        $program->save();
        return redirect()->route('program.index')->with(['success' => 'Berhasil Mengubah Program']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kdprog)
    {
        $program = Program::where('kdprog', $kdprog)->first();
        
        $program->delete();
        return redirect()->route('program.index')->with(['success' => 'Berhasil Menghapus Program']);
    }
}
