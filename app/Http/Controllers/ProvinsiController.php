<?php

namespace App\Http\Controllers;

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
}
