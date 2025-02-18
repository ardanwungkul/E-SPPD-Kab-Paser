<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:Daftar Provinsi', ['only' => ['index']]);
        $this->middleware('permission:Tambah Provinsi', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Provinsi', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Provinsi', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Provinsi::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama', 'LIKE', "%{$request->search}%");
        }

        $data = $query->paginate(10)->appends(['search' => $request->search]);

        return view('master.provinsi.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);
        $provinsi = new Provinsi();
        $provinsi->nama = $request->nama;
        $provinsi->longitude = $request->longitude;
        $provinsi->latitude = $request->latitude;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['success' => 'Berhasil Menambahkan Provinsi']);
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
    public function edit(Provinsi $provinsi)
    {
        return view('master.provinsi.edit', compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        $request->validate([
            'nama' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);
        $provinsi->nama = $request->nama;
        $provinsi->longitude = $request->longitude;
        $provinsi->latitude = $request->latitude;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['success' => 'Berhasil Mengubah Provinsi']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with(['success' => 'Berhasil Menghapus Provinsi']);
    }
}
