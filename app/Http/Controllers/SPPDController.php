<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\KopSurat;
use App\Models\Provinsi;
use App\Models\SPPD;
use App\Models\SPT;
use App\Models\TingkatPerjalananDinas;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SPPDController extends Controller
{
    public function terbilang($angka)
    {
        $angka = abs($angka);
        $baca = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

        if ($angka < 12) {
            return $baca[$angka];
        } elseif ($angka < 20) {
            return $this->terbilang($angka - 10) . " belas";
        } elseif ($angka < 100) {
            return $this->terbilang(intdiv($angka, 10)) . " puluh " . $this->terbilang($angka % 10);
        }

        return $angka;
    }

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
            $data = SPT::with('sppd')
                ->where('tahun', session('tahun'))
                ->get()
                ->sortBy(function ($item) {
                    return [
                        // 0 = tidak punya sppd (paling atas)
                        $item->sppd ? 1 : 0,

                        // nosppd DESC → pakai minus
                        - ($item->sppd->nosppd ?? 0),
                        - ($item->sppd->urut ?? 0),
                    ];
                })
                ->values()
                ->map(function ($item) {
                    $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();

                    $nospt = str_pad($item->nospt, 3, '0', STR_PAD_LEFT);
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

                    $item->format_sppd = '';

                    if ($item->sppd) {
                        $nosppd = str_pad($item->sppd->nosppd, 3, '0', STR_PAD_LEFT);
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
                                $item->nosurat,
                                $this->getBulanRomawi(Carbon::parse($item->sppd->created_at)->format('m')),
                                $item->tahun
                            ],
                            $config_no_sppd
                        );
                    }
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

        if ($spt->sppd) {
            return redirect()->route('sppd.show', $spt->sppd->id);
        }

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

        $spt->format_spt = 'SPT-';
        $nospt = str_pad($spt->nospt, 3, '0', STR_PAD_LEFT);
        $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();
        $config_no_spt = $config->no_spt;
        $spt->format_spt = str_replace(
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
                $spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($spt->tglspt)->format('m')),
                $spt->tahun
            ],
            $config_no_spt
        );

        $spt->jmlbahasa = $this->terbilang($spt->jmlhari);

        $spt->tglbrkt = Carbon::parse($spt->tglbrkt)
            ->translatedFormat('l, d F Y');

        $spt->tglbalik = Carbon::parse($spt->tglbalik)
            ->translatedFormat('l, d F Y');

        $spt->tglspt = Carbon::parse($spt->tglspt)
            ->translatedFormat('l, d F Y');

        $tingkat = TingkatPerjalananDinas::all();

        $provinsi = Provinsi::all();
        $kabkota = KabupatenKota::all();
        $kecamatan = Kecamatan::all();

        $oldnosppd = SPPD::where('tahun', session('tahun'))->max('nosppd');
        $nosppd = $oldnosppd ? $oldnosppd + 1 : 1;

        // dd($spt);
        return view('master.sppd.create', compact('spt', 'tingkat', 'provinsi', 'kabkota', 'kecamatan', 'nosppd'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'angkutan' => 'required|max:50',
            ],
            [
                'angkutan.required' => 'Angkutan Wajib di Isi!',
                'angkutan.max' => 'Maksimal Angkutan adalah 50 Karakter',
            ]
        );
        // dd($request->spt);

        $sppd = new SPPD;

        $sppd->tahun = session('tahun');

        $sppd->nosppd = $request->nosppd;

        $lastUrut = SPT::where('tahun', $sppd->tahun)
            ->where('nospt', $sppd->nosppd)
            ->max('urut');

        $sppd->urut  = $lastUrut ? $lastUrut + 1 : 1;

        // $noakhir = SPPD::where('tahun', session('tahun'))->max('nosppd');
        // $sppd->nosppd = $noakhir ? $noakhir + 1 : 1;

        $sppd->spt_id = $request->spt;
        $sppd->angkutan = $request->angkutan;
        $sppd->kd_rek = $request->kdrek ?? '';
        $sppd->keterangan = $request->keterangan ?? '';

        $sppd->save();

        return redirect()->route('sppd.show', $sppd->id)->with(['success' => 'Berhasil Membuat Surat Perjalanan Dinas']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SPPD $sppd)
    {
        $index = 1;
        $tujuan = [];

        while (true) {
            $prov = $sppd->spt->{"provinsi_id{$index}"};
            $provname = Provinsi::find($prov)->nama ?? null;
            $kab  = $sppd->spt->{"kabkota_id{$index}"};
            $kabname = KabupatenKota::find($kab)->nama ?? null;
            $kec  = $sppd->spt->{"kecamatan_id{$index}"};
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

        $sppd->spt->tujuan = $tujuan;

        $sppd->spt->jmlbahasa = $this->terbilang($sppd->spt->jmlhari);

        $sppd->spt->tglbrkt = Carbon::parse($sppd->spt->tglbrkt)
            ->translatedFormat('l, d F Y');

        $sppd->spt->tglbalik = Carbon::parse($sppd->spt->tglbalik)
            ->translatedFormat('l, d F Y');

        $sppd->spt->tglspt = Carbon::parse($sppd->spt->tglspt)
            ->translatedFormat('l, d F Y');


        return view('master.sppd.show', compact('sppd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SPPD $sppd)
    {
        $index = 1;
        $tujuan = [];

        while (true) {
            $prov = $sppd->spt->{"provinsi_id{$index}"};
            $provname = Provinsi::find($prov)->nama ?? null;
            $kab  = $sppd->spt->{"kabkota_id{$index}"};
            $kabname = KabupatenKota::find($kab)->nama ?? null;
            $kec  = $sppd->spt->{"kecamatan_id{$index}"};
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

        $sppd->spt->tujuan = $tujuan;

        $sppd->spt->format_spt = 'SPT-';
        $nospt = str_pad($sppd->spt->nospt, 3, '0', STR_PAD_LEFT);
        $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();
        $config_no_spt = $config->no_spt;
        $sppd->spt->format_spt = str_replace(
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
                $sppd->spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($sppd->spt->tglspt)->format('m')),
                $sppd->spt->tahun
            ],
            $config_no_spt
        );

        $sppd->spt->jmlbahasa = $this->terbilang($sppd->spt->jmlhari);

        $sppd->spt->tglbrkt = Carbon::parse($sppd->spt->tglbrkt)
            ->translatedFormat('l, d F Y');

        $sppd->spt->tglbalik = Carbon::parse($sppd->spt->tglbalik)
            ->translatedFormat('l, d F Y');

        $sppd->spt->tglspt = Carbon::parse($sppd->spt->tglspt)
            ->translatedFormat('l, d F Y');

        $tingkat = TingkatPerjalananDinas::all();

        $provinsi = Provinsi::all();
        $kabkota = KabupatenKota::all();
        $kecamatan = Kecamatan::all();

        // dd($spt);
        return view('master.sppd.edit', compact('sppd', 'tingkat', 'provinsi', 'kabkota', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SPPD $sppd)
    {
        $request->validate(
            [
                'angkutan' => 'required|max:50',
            ],
            [
                'angkutan.required' => 'Angkutan Wajib di Isi!',
                'angkutan.max' => 'Maksimal Angkutan adalah 50 Karakter',
            ]
        );

        $sppd->angkutan = $request->angkutan;
        $sppd->kd_rek = $request->kdrek ?? '';
        $sppd->keterangan = $request->keterangan ?? '';

        $sppd->save();

        return redirect()->route('sppd.show', $sppd->id)->with(['success' => 'Berhasil Mengubah Surat Perjalanan Dinas']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function print(SPPD $sppd)
    {
        $kop_surat = KopSurat::first();

        $index = 1;
        $tujuan = [];

        while (true) {
            $prov = $sppd->spt->{"provinsi_id{$index}"};
            $provname = Provinsi::find($prov)->nama ?? null;
            $kab  = $sppd->spt->{"kabkota_id{$index}"};
            $kabname = KabupatenKota::find($kab)->nama ?? null;
            $kec  = $sppd->spt->{"kecamatan_id{$index}"};
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

        $sppd->spt->tujuan = $tujuan;

        $sppd->spt->format_spt = 'SPT-';
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
                123,
                $this->getBulanRomawi(Carbon::parse($sppd->created_at)->format('m')),
                $sppd->tahun
            ],
            $config_no_sppd
        );

        $sppd->spt->jmlbahasa = $this->terbilang($sppd->spt->jmlhari);

        $sppd->spt->tglbrkt = Carbon::parse($sppd->spt->tglbrkt)
            ->translatedFormat('l, d F Y');

        $sppd->spt->tglbalik = Carbon::parse($sppd->spt->tglbalik)
            ->translatedFormat('l, d F Y');

        $sppd->spt->tglspt = Carbon::parse($sppd->spt->tglspt)
            ->translatedFormat('l, d F Y');

        // return view('master.sppd.pdf', compact('sppd', 'kop_surat'));

        $pdf = Pdf::loadView('master.sppd.pdf', compact('sppd', 'kop_surat'));
        $pdf->setOptions([
            'defaultFont' => 'Times New Roman',
            'margin_top' => 50,
            'margin_right' => 30,
            'margin_bottom' => 50,
            'margin_left' => 30,
        ]);

        $pdf->setPaper('A4');
        return $pdf->download('Surat Perjalanan Dinas ' . str_replace(['/', '\\'], '-', $sppd->format_sppd) . '.pdf');
    }
}
