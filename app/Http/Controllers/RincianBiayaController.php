<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\RincianBiaya;
use App\Models\Pegawai;
use App\Models\SPPD;
use App\Models\SPT;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RincianBiayaController extends Controller
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
            $data = SPPD::with('spt')
                ->where('tahun', session('tahun'))
                ->orderBy('nosppd', 'desc')
                ->get()
                ->map(function ($item) {
                    $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();
    
                    $nosppd = str_pad($item->nosppd, 3, '0', STR_PAD_LEFT);
                    $config_no_sppd = $config->no_sppd;
                    $item->format_sppd = str_replace(
                        [
                            '{nomor_urut}',
                            '{lembaga}',
                            '{nomor_surat}',
                            '{bulan}',
                            '{tahun}'
                        ],
                        [
                            $nosppd,
                            'DPRD',
                            $item->spt->nosurat,
                            $this->getBulanRomawi(Carbon::parse($item->created_at)->format('m')),
                            $item->tahun
                        ],
                        $config_no_sppd
                    );
                    
                    $nospt = str_pad($item->spt->nospt, 3, '0', STR_PAD_LEFT);
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
                            $item->spt->nosurat,
                            $this->getBulanRomawi(Carbon::parse($item->spt->tglspt)->format('m')),
                            $item->tahun
                        ],
                        $config_no_spt
                    );
    
                    return $item;
                });

            return DataTables::of($data)->addIndexColumn()->make(true);
        }

        return view('master.rincian-biaya.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sppd = SPPD::with('spt')->find($request->sppd);

        $index = 1;
        $tujuan = [];

        while (true) {
            $prov = $sppd->spt->{"provinsi_id{$index}"};
            $provname = Provinsi::find($prov)->nama ?? null;
            $kab  = $sppd->spt->{"kabkota_id{$index}"};
            $kabname = KabupatenKota::find($kab)->nama ?? null;
            $kec  = $sppd->spt->{"kecamatan_id{$index}"};
            $kecname = kecamatan::find($kec)->nama ?? null;

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

        $sppd->tujuan = $tujuan;

        $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();
    
        $nosppd = str_pad($sppd->nosppd, 3, '0', STR_PAD_LEFT);
        $config_no_sppd = $config->no_sppd;
        $sppd->format_sppd = str_replace(
            [
                '{nomor_urut}',
                '{lembaga}',
                '{nomor_surat}',
                '{bulan}',
                '{tahun}'
            ],
            [
                $nosppd,
                'DPRD',
                $sppd->spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($sppd->created_at)->format('m')),
                $sppd->tahun
            ],
            $config_no_sppd
        );

        $pegawai = Pegawai::with('pangkat')
            ->leftJoin('ref_pangkat', 'pegawai.pangkat_id', '=', 'ref_pangkat.id')
            ->orderByRaw('
                CASE 
                    WHEN pegawai.pangkat_id IS NULL OR pegawai.pangkat_id = 0 THEN 1
                    ELSE 0
                END
            ')
            ->orderBy('ref_pangkat.jnspeg', 'asc')
            ->orderBy('ref_pangkat.kdgol', 'desc')
            ->orderBy('pegawai.nama', 'asc')
            ->select('pegawai.*')
            ->get();

        return view('master.rincian-biaya.create', compact('sppd', 'pegawai'));
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
    public function show(RincianBiaya $rincianBiaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RincianBiaya $rincianBiaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RincianBiaya $rincianBiaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RincianBiaya $rincianBiaya)
    {
        //
    }
}
