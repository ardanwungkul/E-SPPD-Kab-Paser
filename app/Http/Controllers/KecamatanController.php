<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index(Request $request)
    {

        $query = Kecamatan::with('kabupaten_kota')->orderBy('kabupaten_kota_id', 'asc');
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama', 'LIKE', "%{$request->search}%")->orWhereHas('kabupaten_kota', function ($q) use ($request) {
                $q->where('nama', 'LIKE', "%{$request->search}%");
            });
        }
        $data = $query->paginate(10)->appends(['search' => $request->search]);
        return view('master.kecamatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kabupaten_kota = KabupatenKota::all();
        return view('master.kecamatan.create', compact('kabupaten_kota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|max:50',
                'kabupaten_kota_id' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
            ],
            [
                'nama.max' => 'Nama Tidak Boleh Lebih Dari 50'
            ]
        );
        $kecamatan = new Kecamatan();
        $kecamatan->nama = $request->nama;
        $kecamatan->longitude = $request->longitude;
        $kecamatan->latitude = $request->latitude;
        $kecamatan->kabupaten_kota_id = $request->kabupaten_kota_id;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['success' => 'Berhasil Menambahkan Kecamatan']);
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
    public function edit(Kecamatan $kecamatan)
    {
        $kabupaten_kota = KabupatenKota::all();
        return view('master.kecamatan.edit', compact('kecamatan', 'kabupaten_kota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate(
            [
                'nama' => 'required|max:50',
                'kabupaten_kota_id' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
            ],
            [
                'nama.max' => 'Nama Tidak Boleh Lebih Dari 50'
            ]
        );
        $kecamatan->nama = $request->nama;
        $kecamatan->longitude = $request->longitude;
        $kecamatan->latitude = $request->latitude;
        $kecamatan->kabupaten_kota_id = $request->kabupaten_kota_id;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['success' => 'Berhasil Mengubah Kecamatan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with(['success' => 'Berhasil Menghapus Kecamatan']);
    }

    public function getKecamatanByKabupatenKota(Request $request)
    {
        $request->validate([
            'kabupaten_kota_id' => 'required',
        ]);
        $kecamatan = Kecamatan::where('kabupaten_kota_id', $request->kabupaten_kota_id)->get();
        return response()->json($kecamatan);
    }
}
