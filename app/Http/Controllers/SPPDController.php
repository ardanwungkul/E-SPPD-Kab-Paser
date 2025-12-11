<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use App\Models\SPPD;
use App\Models\SPT;
use App\Models\TingkatPerjalananDinas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SPPDController extends Controller
{
    private function getBulanRomawi($bulan)
    {
        $romawi = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
        ];

        return $romawi[(int)$bulan] ?? '';
    }
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
                    $item->format_sppd = $item->format_nomor;
                    return $item;
                });

            return DataTables::of($data)->addIndexColumn()->make(true);
        }

        return view('master.sppd.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $spt = SPT::find($request->spt);

        $index = 1;
        $tujuan = [];

        while (true) {
            $prov = $spt->{"provinsi_id{$index}"};
            $provname = Provinsi::find($prov)->nama ?? null;
            $kab  = $spt->{"kabkota_id{$index}"};
            $kabname = KabupatenKota::find($kab)->nama ?? null;
            $kec  = $spt->{"kecamatan_id{$index}"};
            $kecname = Provinsi::find($kec)->nama ?? null;

            if (!$prov) break;

            $tujuan[] = [
                'provinsi_id' => $prov,
                'provinsi_name' => $provname,
                'kabkota_id'  => $kab,
                'kabkota_name' => $kabname,
                'kecamatan_id' => $kec,
                'kecamatan_name' => $kecname,
            ];

            $index++;
        }

        $spt->tujuan = $tujuan;

        $spt->tanggal_berangkat = Carbon::parse($spt->tanggal_berangkat)
            ->translatedFormat('l, d F Y');

        $spt->tanggal_kembali = Carbon::parse($spt->tanggal_kembali)
            ->translatedFormat('l, d F Y');

        $tingkat = TingkatPerjalananDinas::all();

        $provinsi = Provinsi::all();
        $kabkota = KabupatenKota::all();
        $kecamatan = Kecamatan::all();

        // dd($spt);
        return view('master.sppd.create', compact('spt', 'tingkat', 'provinsi', 'kabkota', 'kecamatan'));
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
