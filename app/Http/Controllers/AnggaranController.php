<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Bidang;
use App\Models\Program;
use App\Models\SubBidang;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Bidang::whereHas('sub_bidang', function ($q) {
                $q->whereHas('anggaran', function ($q) {
                    $q->where('tahun', session('tahun'));
                });
            })
            ->with([
                'sub_bidang' => function ($q) {
                    $q->with(['anggaran' => function ($q) {
                        $q->where('tahun', session('tahun'));
                    }]);
                }
            ]);

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

        return view('master.anggaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $program = Program::where('tahun', session('tahun'))->get();
        $bidang = Bidang::where('tahun', session('tahun'))
            ->when(Auth::user()->level < 3, function ($query) {
                $query->where('id', Auth::user()->bidang_id);
            })->get();

        $sub_kegiatan = $request->has('sub_kegiatan') ? SubKegiatan::find($request->sub_kegiatan) : null;
        $sub_bidang = $request->has('sub_bidang') ? SubBidang::find($request->sub_bidang) : null;

        return view('master.anggaran.create', compact('program', 'bidang', 'sub_kegiatan', 'sub_bidang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $anggaran = Anggaran::where('kdsub', $request->sub_kegiatan_id)
            ->where('tahun', session('tahun'))
            ->where('bidang_sub_id', $request->sub_bidang_id)
            ->first();

        if (!$anggaran) {

            $anggaran = new Anggaran();

            $anggaran->kdprog = $request->program_id;
            $anggaran->kdgiat = $request->kegiatan_id;
            $anggaran->kdsub = $request->sub_kegiatan_id;

            $anggaran->bidang_id = $request->bidang_id;
            $anggaran->bidang_sub_id = $request->sub_bidang_id;

            $anggaran->rp_pagu1 = preg_replace('/[^0-9-]/', '', $request->rp_pagu1 ?? 0);
            $anggaran->rp_pagu2 = preg_replace('/[^0-9-]/', '', $request->rp_pagu2 ?? 0);
            $anggaran->rp_pagu3 = preg_replace('/[^0-9-]/', '', $request->rp_pagu3 ?? 0);

            $anggaran->tahun = session('tahun');
            $anggaran->save();
        } else {

            $anggaran->rp_pagu1 = preg_replace('/[^0-9-]/', '', $request->rp_pagu1 ?? 0);
            $anggaran->rp_pagu2 = preg_replace('/[^0-9-]/', '', $request->rp_pagu2 ?? 0);
            $anggaran->rp_pagu3 = preg_replace('/[^0-9-]/', '', $request->rp_pagu3 ?? 0);

            $anggaran->save();
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
        $program = Program::where('tahun', session('tahun'))->get();
        $bidang = Bidang::where('tahun', session('tahun'))->get();
        return view('master.anggaran.edit', compact('anggaran', 'program', 'bidang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggaran $anggaran)
    {
        $anggaran->rp_pagu1 = preg_replace('/[^0-9-]/', '', $request->rp_pagu1 ?? 0);
        $anggaran->rp_pagu2 = preg_replace('/[^0-9-]/', '', $request->rp_pagu2 ?? 0);
        $anggaran->rp_pagu3 = preg_replace('/[^0-9-]/', '', $request->rp_pagu3 ?? 0);

        $anggaran->save();

        return redirect()->route('anggaran.index')->with(['success' => 'Berhasil Mengubah Anggaran tahunan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggaran $anggaran)
    {
        //
    }
}
