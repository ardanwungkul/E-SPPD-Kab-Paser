<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Config;
use App\Models\JenisPerjalanan;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kegiatan;
use App\Models\KopSurat;
use App\Models\NotaDinas;
use App\Models\Pegawai;
use App\Models\Program;
use App\Models\Provinsi;
use App\Models\SPT;
use App\Models\SPTDasar;
use App\Models\SPTPegawai;
use App\Models\SPTUntuk;
use App\Models\SubBidang;
use App\Models\SubKegiatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SPTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SPT::with('sppd')->where('tahun', session('tahun'))->orderBy('nospt', 'desc')->get()
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
        return view('master.spt.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pegawai = Pegawai::with('pangkat')
            ->join('ref_pangkat', 'pegawai.pangkat_id', '=', 'ref_pangkat.id')
            ->orderBy('ref_pangkat.jnspeg', 'asc')
            ->orderBy('ref_pangkat.kdgol', 'desc')
            ->orderBy('nama', 'asc')
            ->select('pegawai.*')
            ->get();

        $program = Program::where('tahun', session('tahun'))->get();
        $kegiatan = Kegiatan::where('tahun', session('tahun'))->get();
        $bidang = Bidang::where('tahun', session('tahun'))
            ->when(Auth::user()->level < 3, function ($query) {
                $query->where('id', Auth::user()->bidang_id);
            })->get();

        $subbidang = SubBidang::where('tahun', session('tahun'))
            ->when(Auth::user()->level < 3, function ($query) {
                $query->where('bidang_id', Auth::user()->bidang_id);
            })->get();

        $subkegiatan = SubKegiatan::where('tahun', session('tahun'))
            ->when(Auth::user()->level < 3, function ($query) {
                $query->whereHas('anggaran', function ($q) {
                    $q->where('bidang_id', Auth::user()->bidang_id);
                });
            })
            ->get();


        $provinsi = Provinsi::all();
        $kabkota = KabupatenKota::all();
        $kecamatan = Kecamatan::all();

        $jenis = JenisPerjalanan::all();

        $oldnospt = SPT::where('tahun', session('tahun'))->max('nospt');
        $nospt = $oldnospt ? $oldnospt + 1 : 1;
        return view('master.spt.create', compact('provinsi', 'kabkota', 'kecamatan', 'pegawai', 'program', 'kegiatan', 'subkegiatan', 'bidang', 'subbidang', 'jenis', 'nospt'));
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'dasar' => 'required',
                'pegawai' => 'required',
                'untuk' => 'required',
                'penandatangan_id' => 'required',
                'penandatangan_tanggal' => 'required',
                'sub_kegiatan_id' => 'required',
                'sub_bidang_id' => 'required',
                'jenis_sppd_id' => 'required',
                'berkas' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:1024',
            ],
            [
                'dasar.required' => 'Minimal harus Mengisi 1 Dasar!',
                'pegawai.required' => 'Minimal harus Mengisi 1 Pegawai!',
                'untuk.required' => 'Minimal harus Mengisi 1 Untuk!',
                'penandatangan_id.required' => 'Penandatangan Wajib di Isi!',
                'penandatangan_tanggal.required' => 'Tanggal Penandatangan Wajib di Isi!',
                'sub_kegiatan_id.required' => 'Sub Kegiatan Wajib di Isi!',
                'sub_bidang_id.required' => 'Sub Bidang Wajib di Isi!',
                'jenis_sppd_id.required' => 'Jenis Perjalanan Dinas Wajib di Isi!',
                'berkas.mimes' => 'berkas harus berupa PDF, JPG, JPEG, atau PNG',
                'berkas.max' => 'berkas tidak boleh lebih dari 1MB',
            ]
        );

        $spt = new SPT();


        $spt->tahun = session('tahun');
        $spt->nospt = $request->nospt;

        $lastUrut = SPT::where('tahun', $spt->tahun)
            ->where('nospt', $spt->nospt)
            ->max('urut');

        $spt->urut  = $lastUrut ? $lastUrut + 1 : 1;
        $spt->nosurat = $request->nosurat ?? 0;

        $spt->jenis_id = $request->jenis_sppd_id;

        $spt->tglspt = $request->penandatangan_tanggal;
        $spt->pejabat_ttd = $request->penandatangan_id;

        $spt->kdgiat_sub = $request->sub_kegiatan_id;
        $spt->bidang_sub_id = $request->sub_bidang_id;

        $spt->tglbrkt = $request->tanggal_berangkat;
        $spt->tglbalik = $request->tanggal_kembali;

        $berangkat = Carbon::parse($request->tanggal_berangkat);
        $kembali = Carbon::parse($request->tanggal_kembali);

        $spt->jmlhari = $berangkat->diffInDays($kembali) + 1;

        if ($request->tujuan) {
            for ($i = 0; $i < 3; $i++) {

                $prov = $request->tujuan[$i]['provinsi_id'] ?? null;
                $kab  = $request->tujuan[$i]['kabupaten_kota_id'] ?? null;
                $kec  = $request->tujuan[$i]['kecamatan_id'] ?? null;

                if (!$prov && $kab) {
                    $kabkota = KabupatenKota::find($kab);
                    if ($kabkota) {
                        $prov = $kabkota->provinsi_id;
                    }
                }

                if (!$prov && !$kab && $kec) {
                    $kecamatan = Kecamatan::find($kec);
                    if ($kecamatan) {
                        $prov = $kecamatan->provinsi_id;
                        $kab  = $kecamatan->kabupaten_kota_id;
                    }
                }

                $spt->{"provinsi_id" . ($i + 1)} = $prov;
                $spt->{"kabkota_id" . ($i + 1)}  = $kab;
                $spt->{"kecamatan_id" . ($i + 1)} = $kec;
            }
        }


        if ($request->berkas) {
            $file = $request->file('berkas');

            $fileName = now()->format('m-d-His') . '.' . $file->getClientOriginalExtension();

            $destination = public_path('storage/' . date('Y') . '/spt');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $fileName);

            $spt->path_spt = 'storage/' . date('Y') . '/spt/' . $fileName;
        }

        $spt->save();

        $i = 0;
        foreach ($request->dasar as $d) {
            $dasar = new SPTDasar();
            $dasar->spt_id = $spt->id;
            $dasar->dasar_ke = $i++;
            $dasar->dasar_ket = $d['uraian'];
            $dasar->save();
        }

        $i = 0;
        foreach ($request->untuk as $u) {
            $untuk = new SPTUntuk();
            $untuk->spt_id = $spt->id;
            $untuk->untuk_ke = $i++;
            $untuk->untuk_ket = $u['uraian'];
            $untuk->save();
        }

        $i = 0;
        foreach ($request->pegawai as $p) {
            $pegawai = new SPTPegawai();
            $pegawai->spt_id = $spt->id;
            $pegawai->pegawai_idx = $i++;
            $pegawai->pegawai_id = $p['id'];
            $pegawai->save();
        }

        if ($request->sppd) {
            return redirect()->route('sppd.create', ['spt' => $spt->id])->with(['success' => 'Berhasil Membuat Surat Perintah Tugas']);
        } else {
            return redirect()->route('spt.show', $spt->id)->with(['success' => 'Berhasil Membuat Surat Perintah Tugas']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SPT $spt)
    {
        return view('master.spt.show', compact('spt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SPT $spt, Request $request)
    {
        $index = 1;
        $tujuan = [];  // get current value or empty array

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

        $pegawai = Pegawai::with('pangkat')
            ->join('ref_pangkat', 'pegawai.pangkat_id', '=', 'ref_pangkat.id')
            ->orderBy('ref_pangkat.jnspeg', 'asc')
            ->orderBy('ref_pangkat.kdgol', 'desc')
            ->orderBy('nama', 'asc')
            ->select('pegawai.*')
            ->get();

        $program = Program::where('tahun', session('tahun'))->get();
        $kegiatan = Kegiatan::where('tahun', session('tahun'))->get();
        $bidang = Bidang::where('tahun', session('tahun'))
            ->when(Auth::user()->level < 3, function ($query) {
                $query->where('id', Auth::user()->bidang_id);
            })->get();

        $subbidang = SubBidang::where('tahun', session('tahun'))
            ->when(Auth::user()->level < 3, function ($query) {
                $query->where('bidang_id', Auth::user()->bidang_id);
            })->get();

        $provinsi = Provinsi::all();
        $kabkota = KabupatenKota::all();
        $kecamatan = Kecamatan::all();

        $jenis = JenisPerjalanan::all();
        return view('master.spt.edit', compact('spt', 'pegawai', 'program', 'kegiatan', 'bidang', 'subbidang', 'kegiatan', 'jenis', 'provinsi', 'kabkota', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SPT $spt)
    {
        $request->validate(
            [
                'dasar' => 'required',
                'pegawai' => 'required',
                'untuk' => 'required',
                'penandatangan_id' => 'required',
                'penandatangan_tanggal' => 'required',
                // 'sub_kegiatan_id' => 'required',
                // 'sub_bidang_id' => 'required',
                // 'jenis_sppd_id' => 'required',
                'berkas' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:1024',
            ],
            [
                'dasar.required' => 'Minimal harus Mengisi 1 Dasar!',
                'pegawai.required' => 'Minimal harus Mengisi 1 Pegawai!',
                'untuk.required' => 'Minimal harus Mengisi 1 Untuk!',
                'penandatangan_id.required' => 'Penandatangan Wajib di Isi!',
                'penandatangan_tanggal.required' => 'Tanggal Penandatangan Wajib di Isi!',
                'sub_kegiatan_id.required' => 'Sub Kegiatan Wajib di Isi!',
                'sub_bidang_id.required' => 'Sub Bidang Wajib di Isi!',
                'jenis_sppd_id.required' => 'Jenis Perjalanan Dinas Wajib di Isi!',
                'berkas.mimes' => 'berkas harus berupa PDF, JPG, JPEG, atau PNG',
                'berkas.max' => 'berkas tidak boleh lebih dari 1MB',
            ]
        );

        // $spt = new SPT();
        $spt->tahun = session('tahun');
        // $spt->nospt = $nospt;
        $spt->urut = 1;
        $spt->nosurat = $request->nosurat ?? 0;

        $spt->tglspt = $request->penandatangan_tanggal;
        $spt->pejabat_ttd = $request->penandatangan_id;

        $spt->tglbrkt = $request->tanggal_berangkat;
        $spt->tglbalik = $request->tanggal_kembali;

        $berangkat = Carbon::parse($request->tanggal_berangkat);
        $kembali = Carbon::parse($request->tanggal_kembali);

        $spt->jmlhari = $berangkat->diffInDays($kembali) + 1;
        if ($request->berkas) {
            $file = $request->file('berkas');

            if ($spt->path_spt && file_exists(public_path($spt->path_spt))) {
                unlink(public_path($spt->path_spt));
            }

            $fileName = now()->format('m-d-His') . '.' . $file->getClientOriginalExtension();

            $destination = public_path('storage/' . date('Y') . '/spt');

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $fileName);

            $spt->path_spt = 'storage/' . date('Y') . '/spt/' . $fileName;
        }

        $spt->save();

        SPTDasar::where('spt_id', $spt->id)->delete();
        SPTUntuk::where('spt_id', $spt->id)->delete();
        SPTPegawai::where('spt_id', $spt->id)->delete();

        $i = 0;
        foreach ($request->dasar as $d) {
            $dasar = new SPTDasar();
            $dasar->spt_id = $spt->id;
            $dasar->dasar_ke = $i++;
            $dasar->dasar_ket = $d['uraian'];
            $dasar->save();
        }

        $i = 0;
        foreach ($request->untuk as $u) {
            $untuk = new SPTUntuk();
            $untuk->spt_id = $spt->id;
            $untuk->untuk_ke = $i++;
            $untuk->untuk_ket = $u['uraian'];
            $untuk->save();
        }

        $i = 0;
        foreach ($request->pegawai as $p) {
            $pegawai = new SPTPegawai();
            $pegawai->spt_id = $spt->id;
            $pegawai->pegawai_idx = $i++;
            $pegawai->pegawai_id = $p['id'];
            $pegawai->save();
        }

        return redirect()->route('spt.show', $spt->id)->with(['success' => 'Berhasil Mengubah Surat Perintah Tugas']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function print(SPT $spt)
    {
        $kop_surat = KopSurat::first();

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

        // return view('master.spt.pdf', compact('spt', 'kop_surat'));

        $pdf = Pdf::loadView('master.spt.pdf', compact('spt', 'kop_surat'));
        $pdf->setOptions([
            'defaultFont' => 'Times New Roman',
            'margin_top' => 50,
            'margin_right' => 30,
            'margin_bottom' => 50,
            'margin_left' => 30,
        ]);
        $pdf->setPaper('A4');
        return $pdf->download('Surat Perintah Tugas ' . str_replace(['/', '\\'], '-', $spt->format_nomor) . '.pdf');
    }

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
}
