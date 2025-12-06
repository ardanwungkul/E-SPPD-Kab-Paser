<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\JenisPegawai;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $data = Golongan::orderBy('id', 'asc')->orderBy('kode_golongan', 'desc')
            ->get();

        return view('master.golongan.index', compact('data'));
    }

    public function getGolonganByJenisPegawai(Request $request)
    {
        $request->validate([
            'jenis_pegawai_id' => 'required|string',
        ]);
        $pangkat = Golongan::where('jenis_pegawai_id', $request->jenis_pegawai_id)->orderBy('kode_golongan', 'desc')->get();
        return response()->json($pangkat);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_pegawai = JenisPegawai::all();
        return view('master.golongan.create', compact('jenis_pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'uraian' => [
                    'required',
                    'max:100'
                ],
                'kode_golongan' => [
                    'required',
                    'max:10'
                ],
                'jenis_pegawai_id' => 'required',
            ],
            [
                'kode_golongan.max' => 'kode Golongan tidak boleh lebih dari 10 karakter',
                'uraian.max' => 'Nama Pangkat tidak boleh lebih dari 100 karakter',
            ]
        );
        $golongan = new Golongan();
        $golongan->uraian = $request->uraian;
        $golongan->kode_golongan = $request->kode_golongan;
        $golongan->jenis_pegawai_id = $request->jenis_pegawai_id;
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
        $jenis_pegawai = JenisPegawai::all();
        return view('master.golongan.edit', compact('golongan', 'jenis_pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Golongan $golongan)
    {
        $request->validate(
            [
                'uraian' => [
                    'required',
                    'max:100'
                ],
                'kode_golongan' => [
                    'required',
                    'max:10'
                ],
                'jenis_pegawai_id' => 'required',
            ],
            [
                'kode_golongan.max' => 'kode Golongan tidak boleh lebih dari 10 karakter',
                'uraian.max' => 'Nama Pangkat tidak boleh lebih dari 100 karakter',
            ]
        );
        $golongan->uraian = $request->uraian;
        $golongan->kode_golongan = $request->kode_golongan;
        $golongan->jenis_pegawai_id = $request->jenis_pegawai_id;
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
