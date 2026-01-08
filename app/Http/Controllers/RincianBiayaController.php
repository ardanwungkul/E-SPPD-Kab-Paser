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
use App\Models\RincianDaftar;
use App\Models\RincianFile;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function terbilang($angka)
    {
        $angka = abs((int) $angka);

        $baca = [
            "",
            "satu",
            "dua",
            "tiga",
            "empat",
            "lima",
            "enam",
            "tujuh",
            "delapan",
            "sembilan",
            "sepuluh",
            "sebelas"
        ];

        if ($angka < 12) {
            return $baca[$angka];
        } elseif ($angka < 20) {
            return $this->terbilang($angka - 10) . " belas";
        } elseif ($angka < 100) {
            return $this->terbilang(intdiv($angka, 10)) . " puluh " . $this->terbilang($angka % 10);
        } elseif ($angka < 200) {
            return "seratus " . $this->terbilang($angka - 100);
        } elseif ($angka < 1000) {
            return $this->terbilang(intdiv($angka, 100)) . " ratus " . $this->terbilang($angka % 100);
        } elseif ($angka < 2000) {
            return "seribu " . $this->terbilang($angka - 1000);
        } elseif ($angka < 1000000) {
            return $this->terbilang(intdiv($angka, 1000)) . " ribu " . $this->terbilang($angka % 1000);
        } elseif ($angka < 1000000000) {
            return $this->terbilang(intdiv($angka, 1000000)) . " juta " . $this->terbilang($angka % 1000000);
        } elseif ($angka < 1000000000000) {
            return $this->terbilang(intdiv($angka, 1000000000)) . " miliar " . $this->terbilang($angka % 1000000000);
        }

        return "";
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = SPPD::with(['spt', 'rincian_biaya'])
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
        // if ($request->ajax()) {

        //     return DataTables::of($data)->addIndexColumn()->make(true);
        // }

        return view('master.rincian-biaya.index', compact('data'));
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

        $nospt = str_pad($sppd->spt->nospt, 3, '0', STR_PAD_LEFT);
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
                'BKAD',
                $sppd->spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($sppd->spt->tglspt)->format('m')),
                $sppd->spt->tahun
            ],
            $config_no_spt
        );

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

        $rincian = RincianBiaya::where('sppd_id', $sppd->id)->pluck('peg_id')->toArray();

        $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();
        $format = $config->no_kwitansi;
        $format = str_replace(
            ['{bulan}', '{tahun}'],
            [
                'Bulan Kwitansi',
                'Tahun Kwitansi'
            ],
            $format
        );

        $nokwitansi = RincianBiaya::where('tahun', session('tahun'))->max('nokwitansi') + 1;

        return view('master.rincian-biaya.create', compact('sppd', 'pegawai', 'rincian', 'nokwitansi', 'format'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $rincianBiaya = new RincianBiaya;

        $rincianBiaya->tahun = session('tahun');
        $rincianBiaya->id = RincianBiaya::where('tahun', session('tahun'))->max('id') + 1;
        $rincianBiaya->nokwitansi = $request->nokwitansi;
        $rincianBiaya->sppd_id = $request->sppd;
        $rincianBiaya->peg_id = $request->pegawai_id;
        $rincianBiaya->pel_id = $request->pelaksana_id;
        $rincianBiaya->bndhr_id = $request->bendahara_id;
        $rincianBiaya->buat_id = $request->pembuat_id;


        $rincianBiaya->save();
        // dd($rincianBiaya);

        $idx = 1;

        foreach ($request->rincian as $item) {
            $daftar = new RincianDaftar();

            $daftar->rincian_id = $rincianBiaya->id;
            $daftar->idx = $idx++;
            $daftar->uraian = $item['uraian'];
            $daftar->jml_satuan = $item['jml_satuan'] ?? 0;
            $daftar->jns_satuan = $item['jns_satuan'] ?? '';
            $daftar->harga = $item['harga'] ? preg_replace('/[^0-9-]/', '', $item['harga']) : 0;
            $daftar->jml_harga = $item['jml_biaya'] ? preg_replace('/[^0-9-]/', '', $item['jml_biaya']) : 0;

            $daftar->save();
        }

        $idx = 1;

        if ($request->hasFile('bukti')) {
            foreach ($request->bukti as $item) {
                if ($item) {
                    $rincianfile = new RincianFile();

                    $file = $item;

                    $fileName = $fileName = now()->format('mdHis') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                    $destination = public_path('storage/' . session('tahun') . '/rincian-biaya');

                    if (!is_dir($destination)) {
                        mkdir($destination, 0755, true);
                    }

                    $file->move($destination, $fileName);

                    $rincianfile->rincian_id = $rincianBiaya->id;
                    $rincianfile->idx = $idx++;
                    $rincianfile->path_rincian = 'storage/' . session('tahun') . '/rincian-biaya/' . $fileName;

                    $rincianfile->save();
                }
            }
        }

        return redirect()->route('rincian-biaya.show', $rincianBiaya->id)->with(['success' => 'Berhasil Membuat Surat Rincian Biaya']);
    }

    /**
     * Display the specified resource.
     */
    public function show(RincianBiaya $rincianBiaya)
    {
        $index = 1;
        $tujuan = [];

        while (true) {
            $prov = $rincianBiaya->sppd->spt->{"provinsi_id{$index}"};
            $provname = Provinsi::find($prov)->nama ?? null;
            $kab  = $rincianBiaya->sppd->spt->{"kabkota_id{$index}"};
            $kabname = KabupatenKota::find($kab)->nama ?? null;
            $kec  = $rincianBiaya->sppd->spt->{"kecamatan_id{$index}"};
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

        $rincianBiaya->sppd->tujuan = $tujuan;

        $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();

        $nospt = str_pad($rincianBiaya->sppd->spt->nospt, 3, '0', STR_PAD_LEFT);
        $config_no_spt = $config->no_spt;
        $rincianBiaya->sppd->spt->format_spt = str_replace(
            [
                '{nomor_urut}',
                '{lembaga}',
                '{nomor_surat}',
                '{bulan}',
                '{tahun}'
            ],
            [
                $nospt,
                'BKAD',
                $rincianBiaya->sppd->spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($rincianBiaya->sppd->spt->tglspt)->format('m')),
                $rincianBiaya->sppd->spt->tahun
            ],
            $config_no_spt
        );

        $nosppd = str_pad($rincianBiaya->sppd->nosppd, 3, '0', STR_PAD_LEFT);
        $config_no_sppd = $config->no_sppd;
        $rincianBiaya->sppd->format_sppd = str_replace(
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
                $rincianBiaya->sppd->spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($rincianBiaya->sppd->created_at)->format('m')),
                $rincianBiaya->sppd->tahun
            ],
            $config_no_sppd
        );

        $nokwitansi = str_pad($rincianBiaya->nokwitansi, 4, '0', STR_PAD_LEFT);
        $format = $config->no_kwitansi;
        $rincianBiaya->format_kwitansi = str_replace(
            ['{nomor_urut}', '{bulan}', '{tahun}'],
            [
                $nokwitansi,
                $this->getBulanRomawi(Carbon::parse($rincianBiaya->created_at)->format('m')),
                $rincianBiaya->tahun
            ],
            $format
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

        return view('master.rincian-biaya.show', compact('rincianBiaya', 'pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RincianBiaya $rincianBiaya)
    {
        $index = 1;
        $tujuan = [];

        while (true) {
            $prov = $rincianBiaya->sppd->spt->{"provinsi_id{$index}"};
            $provname = Provinsi::find($prov)->nama ?? null;
            $kab  = $rincianBiaya->sppd->spt->{"kabkota_id{$index}"};
            $kabname = KabupatenKota::find($kab)->nama ?? null;
            $kec  = $rincianBiaya->sppd->spt->{"kecamatan_id{$index}"};
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

        $rincianBiaya->sppd->tujuan = $tujuan;

        $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();

        $nospt = str_pad($rincianBiaya->sppd->spt->nospt, 3, '0', STR_PAD_LEFT);
        $config_no_spt = $config->no_spt;
        $rincianBiaya->sppd->spt->format_spt = str_replace(
            [
                '{nomor_urut}',
                '{lembaga}',
                '{nomor_surat}',
                '{bulan}',
                '{tahun}'
            ],
            [
                $nospt,
                'BKAD',
                $rincianBiaya->sppd->spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($rincianBiaya->sppd->spt->tglspt)->format('m')),
                $rincianBiaya->sppd->spt->tahun
            ],
            $config_no_spt
        );

        $nosppd = str_pad($rincianBiaya->sppd->nosppd, 3, '0', STR_PAD_LEFT);
        $config_no_sppd = $config->no_sppd;
        $rincianBiaya->sppd->format_sppd = str_replace(
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
                $rincianBiaya->sppd->spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($rincianBiaya->sppd->created_at)->format('m')),
                $rincianBiaya->sppd->tahun
            ],
            $config_no_sppd
        );

        $format = $config->no_kwitansi;
        $format = str_replace(
            ['{bulan}', '{tahun}'],
            [
                $this->getBulanRomawi(Carbon::parse($rincianBiaya->created_at)->format('m')),
                $rincianBiaya->tahun
            ],
            $format
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

        return view('master.rincian-biaya.edit', compact('rincianBiaya', 'pegawai', 'format'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RincianBiaya $rincianBiaya)
    {
        // dd($request);
        // $rincianBiaya->peg_id = $request->pegawai_id;
        $rincianBiaya->nokwitansi = $request->nokwitansi;
        $rincianBiaya->pel_id = $request->pelaksana_id;
        $rincianBiaya->bndhr_id = $request->bendahara_id;
        $rincianBiaya->buat_id = $request->pembuat_id;

        $rincianBiaya->save();

        RincianDaftar::where('rincian_id', $rincianBiaya->id)->delete();

        $idx = 1;

        foreach ($request->rincian as $item) {
            $daftar = new RincianDaftar();

            $daftar->rincian_id = $rincianBiaya->id;
            $daftar->idx = $idx++;
            $daftar->uraian = $item['uraian'];
            $daftar->jml_satuan = $item['jml_satuan'] ?? 0;
            $daftar->jns_satuan = $item['jns_satuan'] ?? '';
            $daftar->harga = $item['harga'] ? preg_replace('/[^0-9-]/', '', $item['harga']) : 0;
            $daftar->jml_harga = $item['jml_biaya'] ? preg_replace('/[^0-9-]/', '', $item['jml_biaya']) : 0;

            $daftar->save();
        }

        if ($request->filled('deleted_files')) {

            $deletedRaw = $request->deleted_files;

            if (is_array($deletedRaw)) {
                $deletedRaw = $deletedRaw[0] ?? '[]';
            }

            $deletedFiles = json_decode($deletedRaw, true);

            if (is_array($deletedFiles) && count($deletedFiles)) {

                $files = RincianFile::whereIn('idx', $deletedFiles)->get();

                foreach ($files as $file) {
                    $path = public_path($file->path_rincian);

                    if (file_exists($path)) {
                        unlink($path);
                    }

                    $file->delete();
                }
            }
        }

        $idx = 1;

        if ($request->hasFile('bukti')) {
            foreach ($request->bukti as $item) {
                if ($item) {
                    $rincianfile = new RincianFile();

                    $file = $item;

                    $fileName = $fileName = now()->format('mdHis') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                    $destination = public_path('storage/' . session('tahun') . '/rincian-biaya');

                    if (!is_dir($destination)) {
                        mkdir($destination, 0755, true);
                    }

                    $file->move($destination, $fileName);

                    $rincianfile->rincian_id = $rincianBiaya->id;
                    $rincianfile->idx = $idx++;
                    $rincianfile->path_rincian = 'storage/' . session('tahun') . '/rincian-biaya/' . $fileName;

                    $rincianfile->save();
                }
            }
        }

        return redirect()->route('rincian-biaya.show', $rincianBiaya->id)->with(['success' => 'Berhasil Membuat Surat Rincian Biaya']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RincianBiaya $rincianBiaya)
    {
        //
    }

    public function print(RincianBiaya $rincianBiaya)
    {
        $index = 1;
        $tujuan = [];

        while (true) {
            $prov = $rincianBiaya->sppd->spt->{"provinsi_id{$index}"};
            $provname = Provinsi::find($prov)->nama ?? null;
            $kab  = $rincianBiaya->sppd->spt->{"kabkota_id{$index}"};
            $kabname = KabupatenKota::find($kab)->nama ?? null;
            $kec  = $rincianBiaya->sppd->spt->{"kecamatan_id{$index}"};
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

        $rincianBiaya->sppd->tujuan = $tujuan;

        $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();

        $nospt = str_pad($rincianBiaya->sppd->spt->nospt, 3, '0', STR_PAD_LEFT);
        $config_no_spt = $config->no_spt;
        $rincianBiaya->sppd->spt->format_spt = str_replace(
            [
                '{nomor_urut}',
                '{lembaga}',
                '{nomor_surat}',
                '{bulan}',
                '{tahun}'
            ],
            [
                $nospt,
                'BKAD',
                $rincianBiaya->sppd->spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($rincianBiaya->sppd->spt->tglspt)->format('m')),
                $rincianBiaya->sppd->spt->tahun
            ],
            $config_no_spt
        );

        $nosppd = str_pad($rincianBiaya->sppd->nosppd, 3, '0', STR_PAD_LEFT);
        $config_no_sppd = $config->no_sppd;
        $rincianBiaya->sppd->format_sppd = str_replace(
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
                $rincianBiaya->sppd->spt->nosurat,
                $this->getBulanRomawi(Carbon::parse($rincianBiaya->sppd->created_at)->format('m')),
                $rincianBiaya->sppd->tahun
            ],
            $config_no_sppd
        );

        $nokwitansi = str_pad($rincianBiaya->nokwitansi, 4, '0', STR_PAD_LEFT);
        $format = $config->no_kwitansi;
        $rincianBiaya->format_kwitansi = str_replace(
            ['{nomor_urut}', '{bulan}', '{tahun}'],
            [
                $nokwitansi,
                $this->getBulanRomawi(Carbon::parse($rincianBiaya->created_at)->format('m')),
                $rincianBiaya->tahun
            ],
            $format
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

        $rincianBiaya->total = $rincianBiaya->daftar()->sum('jml_harga');

        $rincianBiaya->totalbahasa = $this->terbilang($rincianBiaya->total);

        // return view('master.rincian-biaya.pdf', compact('rincianBiaya', 'pegawai'));

        $pdf = Pdf::loadView('master.rincian-biaya.pdf', compact('rincianBiaya', 'pegawai'));
        $pdf->setOptions([
            'defaultFont' => 'Times New Roman',
            'margin_top' => 50,
            'margin_right' => 30,
            'margin_bottom' => 50,
            'margin_left' => 30,
        ]);
        $pdf->setPaper('A4');
        return $pdf->download('Surat Kwitansi Dinas ' . str_replace(['/', '\\'], '-', '') . '.pdf');
    }
}
