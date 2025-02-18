<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Bidang;
use App\Models\JenisPerjalanan;
use App\Models\Program;
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
        $program = Program::where('tahun', session('tahun'))->get();
        $jenis = JenisPerjalanan::all();
        $bidang = Bidang::where('tahun', session('tahun'))->get();
        return view('master.anggaran.create', compact('program', 'bidang', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        foreach ($request->anggaran as $jenis) {
            if ($jenis['rp_pagu'] && $jenis['rp_pagu'] !== null) {
                $existAnggaran = Anggaran::where('sub_kegiatan_id', $request->sub_kegiatan_id)
                    ->where('tahun', session('tahun'))
                    ->where('bidang_sub_id', $request->sub_bidang_id)
                    ->where('jenis_sppd_id', $jenis['id'])->exists();
                if (!$existAnggaran) {
                    $anggaran = new Anggaran();
                    $anggaran->sub_kegiatan_id = $request->sub_kegiatan_id;
                    $anggaran->bidang_sub_id = $request->sub_bidang_id;
                    $anggaran->jenis_sppd_id = $jenis['id'];
                    $anggaran->rp_pagu = preg_replace('/[^0-9-]/', '', $jenis['rp_pagu']);
                    $anggaran->tahun = session('tahun');
                    $anggaran->save();
                } else {
                    $anggaran = Anggaran::where('sub_kegiatan_id', $request->sub_kegiatan_id)
                        ->where('tahun', session('tahun'))
                        ->where('bidang_sub_id', $request->sub_bidang_id)
                        ->where('jenis_sppd_id', $jenis['id'])->first();
                    $anggaran->rp_pagu = preg_replace('/[^0-9-]/', '', $jenis['rp_pagu']);
                    $anggaran->save();
                }
            }
        }
        return redirect()->route('anggaran.index')->with(['success' => 'Berhasil Menambahkan Anggaran tahunan']);
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
