<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\SubBidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SubBidangController extends Controller
{
    public function index()
    {
        $data = Bidang::where('tahun', session('tahun'))->get();
        return view('master.sub-bidang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidang = Bidang::where('tahun', session('tahun'))
            ->when(Auth::user()->level < 3, function ($query) {
                $query->where('id', Auth::user()->bidang_id);
            })->get();

        return view('master.sub-bidang.create', compact('bidang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'uraian' =>  [
                'required',
                'max:100',
                Rule::unique('ref_bidang_sub')->where(function ($query) use ($request) {
                    return $query->where('tahun', session('tahun'))->where('bidang_id', $request->bidang_id);
                })
            ],
            'bidang_id' => 'required'
        ], [
            'uraian.max' => 'Nama Sub. Bidang tidak boleh lebih dari 100 karakter',
            'uraian.required' => 'Nama Sub. Bidang Wajib Diisi',
            'uraian.unique' => 'Nama Sub. Bidang Sudah Digunakan',
            'bidang_id.required' => 'Bidang Wajib Diisi'
        ]);
        $sub_bidang = new SubBidang();
        $sub_bidang->bidang_id = $request->bidang_id;
        $sub_bidang->uraian = $request->uraian;
        $sub_bidang->tahun = session('tahun');
        $sub_bidang->save();

        return redirect()->route('sub-bidang.index')->with(['success' => 'Berhasil Menambahkan Sub. Bidang']);
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
    public function edit(SubBidang $sub_bidang)
    {
        $bidang = Bidang::where('tahun', session('tahun'))
            ->when(Auth::user()->level < 3, function ($query) {
                $query->where('id', Auth::user()->bidang_id);
            })->get();
        return view('master.sub-bidang.edit', compact('bidang', 'sub_bidang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubBidang $sub_bidang)
    {
        $request->validate(
            [
                'uraian' =>  [
                    'max:100',
                    'required',
                    Rule::unique('ref_bidang_sub')->where(function ($query) use ($request) {
                        return $query->where('tahun', session('tahun'))->where('bidang_id', $request->bidang_id);
                    })->ignore($sub_bidang->id)
                ],
                'bidang_id' => 'required'
            ],
            [
                'uraian.max' => 'Nama Sub. Bidang tidak boleh lebih dari 100 karakter',
                'uraian.required' => 'Nama Sub. Bidang Wajib Diisi',
                'uraian.unique' => 'Nama Sub. Bidang Sudah Digunakan',
                'bidang_id.required' => 'Bidang Wajib Diisi'
            ]
        );
        $sub_bidang->bidang_id = $request->bidang_id;
        $sub_bidang->uraian = $request->uraian;
        $sub_bidang->save();

        return redirect()->route('sub-bidang.index')->with(['success' => 'Berhasil Mengubah Sub. Bidang']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubBidang $sub_bidang)
    {
        $sub_bidang->delete();
        return redirect()->route('sub-bidang.index')->with(['success' => 'Berhasil Menghapus Sub. Bidang']);
    }
    public function getSubBidangByBidang(Request $request)
    {
        $request->validate([
            'bidang_id' => 'required|string',
        ]);
        $sub_bidang = SubBidang::where('bidang_id', $request->bidang_id)->get();
        return response()->json($sub_bidang);
    }
}
