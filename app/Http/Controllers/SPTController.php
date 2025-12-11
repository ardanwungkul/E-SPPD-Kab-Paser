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

        $provinsi = Provinsi::all();
        $kabkota = KabupatenKota::all();
        $kecamatan = Kecamatan::all();

        $jenis = JenisPerjalanan::all();
        return view('master.spt.create', compact('provinsi', 'kabkota', 'kecamatan', 'pegawai', 'program', 'kegiatan', 'bidang', 'subbidang', 'jenis'));
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
                'berkas' => 'required|file|mimes:pdf,jpg,jpeg,png|max:1024',
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

        $nomor_urut_terakhir = SPT::where('tahun', session('tahun'))->max('nospt');
        $nomor_urut_baru = $nomor_urut_terakhir ? $nomor_urut_terakhir + 1 : 1;
        $nospt = str_pad($nomor_urut_baru, 3, '0', STR_PAD_LEFT);
        $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();
        $config_no_spt = $config->no_spt;
        // $no_spt = str_replace(
        //     [
        //         '{nomor_urut}',
        //         '{lembaga}',
        //         '{bulan}',
        //         '{tahun}'
        //     ],
        //     [
        //         $nomor_urut,
        //         $request->is_dprd == 'dprd' ? 'DPRD' : 'Setwan',
        //         $this->getBulanRomawi(date('m')),
        //         session('tahun')
        //     ],
        //     $config_no_spt
        // );

        $spt = new SPT();
        $spt->tahun = session('tahun');
        $spt->nospt = $nospt;
        $spt->urut = 1;
        $spt->nosurat = $request->nosurat;

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

        $spt->provinsi_id = $request->provinsi_id;
        $spt->kabkota_id = $request->kabupaten_kota_id;

        if (!$spt->provinsi_id && $spt->kabkota_id) {
            $kabkota = KabupatenKota::find($spt->kabkota_id);

            $spt->provinsi_id = $kabkota->provinsi_id;
        }

        $spt->kecamatan_id = $request->kecamatan_id;

        if (!$spt->provinsi_id && !$spt->kabkota_id) {
            $kecamatan = Kecamatan::find($spt->kecamatan_id);

            $spt->provinsi_id = $kecamatan->provinsi_id;
            $spt->kabkota_id = $kecamatan->kabupaten_kota_id;
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

        return redirect()->route('spt.show', $spt->id)->with(['success' => 'Berhasil Membuat Surat Perintah Tugas']);
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
    public function print(SPT $spt)
    {
        $kop_surat = KopSurat::first();
        $pdf = Pdf::loadView('master.spt.pdf', compact('spt', 'kop_surat'));
        $pdf->setOptions([
            'defaultFont' => 'Times New Roman',
            'margin_top' => 50,
            'margin_right' => 30,
            'margin_bottom' => 50,
            'margin_left' => 30,
        ]);
        $pdf->setPaper('A4');
        return $pdf->download('Surat Perintah Tugas ' . str_replace(['/', '\\'], '-', $spt->nomor) . '.pdf');
    }
}
