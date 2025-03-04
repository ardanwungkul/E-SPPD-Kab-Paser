<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KabupatenKotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Kabupaten/Kota', ['only' => ['index']]);
        $this->middleware('permission:Tambah Kabupaten/Kota', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Kabupaten/Kota', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Kabupaten/Kota', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $query = KabupatenKota::with('provinsi')->orderBy('provinsi_id', 'asc');

        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama', 'LIKE', "%{$request->search}%")->orWhereHas('provinsi', function ($q) use ($request) {
                $q->where('nama', 'LIKE', "%{$request->search}%");
            });
        }

        $data = $query->paginate(10)->appends(['search' => $request->search]);

        return view('master.kabupaten-kota.index', compact('data'));
    }

    public function create()
    {
        $provinsi = Provinsi::all();
        return view('master.kabupaten-kota.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|max:50',
                'provinsi_id' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
            ],
            [
                'nama.max' => 'Nama Tidak Boleh Lebih Dari 50'
            ]
        );


        $kabupaten_kota = new KabupatenKota();
        $kabupaten_kota->nama = $request->nama;
        $kabupaten_kota->longitude = $request->longitude;
        $kabupaten_kota->latitude = $request->latitude;
        $kabupaten_kota->provinsi_id = $request->provinsi_id;
        $kabupaten_kota->save();
        return redirect()->route('kabupaten-kota.index')->with(['success' => 'Berhasil Menambahkan Kabupaten/Kota']);
    }

    public function edit(KabupatenKota $kabupaten_kota)
    {
        $provinsi = Provinsi::all();
        return view('master.kabupaten-kota.edit', compact('provinsi', 'kabupaten_kota'));
    }

    public function update(Request $request, KabupatenKota $kabupaten_kota)
    {
        $request->validate(
            [
                'nama' => 'required|max:50',
                'provinsi_id' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
            ],
            [
                'nama.max' => 'Nama Tidak Boleh Lebih Dari 50'
            ]
        );
        $kabupaten_kota->nama = $request->nama;
        $kabupaten_kota->longitude = $request->longitude;
        $kabupaten_kota->latitude = $request->latitude;
        $kabupaten_kota->provinsi_id = $request->provinsi_id;
        $kabupaten_kota->save();
        return redirect()->route('kabupaten-kota.index')->with(['success' => 'Berhasil Mengubah Kabupaten/Kota']);
    }

    public function destroy(KabupatenKota $kabupaten_kota)
    {
        $kabupaten_kota->delete();
        return redirect()->route('kabupaten-kota.index')->with(['success' => 'Berhasil Menghapus Kabupaten/Kota']);
    }

    public function getKabupatenKotaByProvinsi(Request $request)
    {
        $request->validate([
            'provinsi_id' => 'required',
        ]);
        $kabupaten = KabupatenKota::where('provinsi_id', $request->provinsi_id)->get();
        return response()->json($kabupaten);
    }
}
