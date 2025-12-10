<?php

namespace App\Http\Controllers;

use App\Models\JenisPerjalanan;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index(Request $request)
    {
        $query = Provinsi::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama', 'LIKE', "%{$request->search}%");
        }

        $data = $query->paginate(20)->appends(['search' => $request->search]);

        return view('master.provinsi.index', compact('data'));
    }

    public function create()
    {
        return view('master.provinsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'longitude' => 'required',
            'latitude' => 'required',
        ], [
            'nama.max' => 'Nama Provinsi Tidak Boleh Lebih Dari 50'
        ]);
        $provinsi = new Provinsi();
        $provinsi->nama = $request->nama;
        $provinsi->longitude = $request->longitude;
        $provinsi->latitude = $request->latitude;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['success' => 'Berhasil Menambahkan Provinsi']);
    }

    public function edit(Provinsi $provinsi)
    {
        return view('master.provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, Provinsi $provinsi)
    {
        $request->validate(
            [
                'nama' => 'required|max:50',
                'longitude' => 'required',
                'latitude' => 'required',
            ],
            [
                'nama.max' => 'Nama Provinsi Tidak Boleh Lebih Dari 50'
            ]
        );
        $provinsi->nama = $request->nama;
        $provinsi->longitude = $request->longitude;
        $provinsi->latitude = $request->latitude;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['success' => 'Berhasil Mengubah Provinsi']);
    }

    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with(['success' => 'Berhasil Menghapus Provinsi']);
    }

    public function getWilayahByJenisSPPD(Request $request)
    {
        $request->validate([
            'jenis_sppd_id' => 'required',
        ]);
        $jenis = JenisPerjalanan::find($request->jenis_sppd_id)->wilayah;

        if ($jenis == 'Provinsi') {
            $kecamatan = null;
            $kabkota = null;
            $provinsi = Provinsi::all();
        }
        if ($jenis == 'Kabupaten') {
            $kecamatan = null;
            $kabkota = KabupatenKota::where('provinsi_id', session('config')->provinsi)->get();
            $provinsi = Provinsi::find(session('config')->provinsi);
        }
        if ($jenis == 'Kecamatan') {
            $kecamatan = Kecamatan::where('kabupaten_kota_id', session('config')->kabkota)->get();
            $kabkota = KabupatenKota::find(session('config')->kabkota);
            $provinsi = Provinsi::find($kabkota->provinsi_id);
        }

        return response()->json([
            'wilayah' => $jenis,
            'provinsi' => $provinsi,
            'kabkota' => $kabkota,
            'kecamatan' => $kecamatan,
        ]);
    }
}
