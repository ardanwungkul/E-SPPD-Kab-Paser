<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Bidang;
use App\Models\JenisPerjalanan;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jenis_sppd = JenisPerjalanan::all();

        $query = Bidang::where('tahun', session('tahun'))->whereHas('sub_bidang', function ($query) {
            $query->whereHas('anggaran');
        })->with(['sub_bidang' => function ($query) {
            $query->whereHas('anggaran');
        }]);

        if ($request->has('q') && $request->q != '') {
            $query->where(function ($query) use ($request) {
                $query->where('uraian', 'like', '%' . $request->q . '%')
                    ->orWhereHas('sub_bidang', function ($q) use ($request) {
                        $q->where('uraian', 'like', '%' . $request->q . '%');
                    })
                    ->orWhereHas('sub_bidang.anggaran.sub_kegiatan.kegiatan.program', function ($q) use ($request) {
                        $q->where('uraian', 'like', '%' . $request->q . '%');
                    })
                    ->orWhereHas('sub_bidang.anggaran.sub_kegiatan.kegiatan', function ($q) use ($request) {
                        $q->where('uraian', 'like', '%' . $request->q . '%');
                    })
                    ->orWhereHas('sub_bidang.anggaran.sub_kegiatan', function ($q) use ($request) {
                        $q->where('uraian', 'like', '%' . $request->q . '%');
                    });
            });
        }

        $data = $query->get();
        return view('master.anggaran.index', compact('data', 'jenis_sppd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggaran $anggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggaran $anggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggaran $anggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggaran $anggaran)
    {
        //
    }
}
