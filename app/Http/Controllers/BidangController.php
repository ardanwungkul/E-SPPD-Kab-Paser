<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Bidang', ['only' => ['index']]);
        $this->middleware('permission:Tambah Bidang', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Bidang', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Bidang', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bidang::where('tahun', session('tahun'))->get();
        return view('master.bidang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.bidang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'uraian' => 'required|unique:ref_bidang'
        ]);
        $bidang = new Bidang();
        $bidang->uraian = $request->uraian;
        $bidang->tahun = session('tahun');
        $bidang->save();

        return redirect()->route('bidang.index')->with(['success' => 'Berhasil Menambahkan Bidang']);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bidang $bidang)
    {
        return view('master.bidang.edit', compact('bidang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bidang $bidang)
    {
        $request->validate([
            'uraian' => 'required|unique:ref_bidang,uraian,' . $bidang->uraian . ',uraian',
        ]);
        $bidang->uraian = $request->uraian;
        $bidang->save();

        return redirect()->route('bidang.index')->with(['success' => 'Berhasil Mengubah Bidang']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bidang $bidang)
    {
        $bidang->delete();
        return redirect()->route('bidang.index')->with(['success' => 'Berhasil Menghapus Bidang']);
    }
}
