<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\SPPD;
use App\Models\SPT;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SPPDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SPT::where('tahun', session('tahun'))->orderBy('nospt', 'desc')->get()
                ->map(function ($item) {
                    $item->format_nomor = 'SPT-';
                    $nospt = str_pad($item->nospt, 3, '0', STR_PAD_LEFT);
                    $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();
                    $config_no_spt = $config->no_spt;
                    $item->format_nomor = str_replace(
                        [
                            '{nomor_urut}',
                            '{lembaga}',
                            '{nomor_surat}',
                            '{bulan}',
                            '{tahun}'
                        ],
                        [
                            $nospt,
                            'DPRD',
                            $item->nosurat,
                            $this->getBulanRomawi(Carbon::parse($item->tglspt)->format('m')),
                            $item->tahun
                        ],
                        $config_no_spt
                    );
                    return $item;
                });

            return DataTables::of($data)->addIndexColumn()->make(true);
        }

        return view('master.sppd.index');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
