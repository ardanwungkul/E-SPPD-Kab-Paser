<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Config;
use App\Models\JenisPerjalanan;
use App\Models\KopSurat;
use App\Models\NotaDinas;
use App\Models\Pegawai;
use App\Models\Program;
use App\Models\SPT;
use App\Models\SPTDasar;
use App\Models\SPTPegawai;
use App\Models\SPTUntuk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
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
            if ($request->lembaga == 'dprd') {
                $data = SPT::where('tahun', session('tahun'))->orderBy('nomor_urut', 'desc')->where('is_dprd', true)->get();
            } else {
                $data = SPT::where('tahun', session('tahun'))->orderBy('nomor_urut', 'desc')->where('is_dprd', false)->get();
            }
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
        return view('master.spt.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (!in_array($request->lembaga, ['setwan', 'dprd'])) {
            return redirect()->route('spt.index');
        }
        $pegawai = Pegawai::with('pangkat')
            ->join('ref_pangkat', 'pegawai.pangkat_id', '=', 'ref_pangkat.id')
            ->orderBy('ref_pangkat.jenis_pegawai_id', 'asc')
            ->orderBy('ref_pangkat.kode_golongan', 'desc')
            ->orderBy('nama', 'asc')
            ->select('pegawai.*')
            ->get();
        $program = Program::where('tahun', session('tahun'))->get();
        $bidang = Bidang::where('tahun', session('tahun'))->get();
        $jenis = JenisPerjalanan::all();
        return view('master.spt.create', compact('pegawai', 'program', 'bidang', 'jenis'));
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
        $request->validate(
            [
                'dasar' => 'required',
                'pegawai' => 'required',
                'untuk' => 'required',
                'penandatangan_id' => 'required',
                'penandatangan_tanggal' => 'required',
                'penandatangan_lokasi' => 'required',
                'sub_kegiatan_id' => 'required',
                'sub_bidang_id' => 'required',
                'jenis_sppd_id' => 'required',
            ],
            [
                'dasar.required' => 'Minimal harus Mengisi 1 Dasar!',
                'pegawai.required' => 'Minimal harus Mengisi 1 Pegawai!',
                'untuk.required' => 'Minimal harus Mengisi 1 Untuk!',
                'penandatangan_id.required' => 'Penandatangan Wajib di Isi!',
                'penandatangan_tanggal.required' => 'Tanggal Penandatangan Wajib di Isi!',
                'penandatangan_lokasi.required' => 'Lokasi Penandatangan Wajib di Isi!',
                'sub_kegiatan_id.required' => 'Sub Kegiatan Wajib di Isi!',
                'sub_bidang_id.required' => 'Sub Bidang Wajib di Isi!',
                'jenis_sppd_id.required' => 'Jenis Perjalanan Dinas Wajib di Isi!',
            ]
        );

        $nomor_urut_terakhir = SPT::where('tahun', session('tahun'))->where('is_dprd', $request->is_dprd == 'dprd' ? true : false)->max('nomor_urut');
        $nomor_urut_baru = $nomor_urut_terakhir ? $nomor_urut_terakhir + 1 : 1;
        $nomor_urut = str_pad($nomor_urut_baru, 3, '0', STR_PAD_LEFT);
        $config = Config::where('tahun', session('tahun'))->where('aktif', 'Y')->first();
        $config_no_spt = $config->no_spt;
        $no_spt = str_replace(
            [
                '{nomor_urut}',
                '{lembaga}',
                '{bulan}',
                '{tahun}'
            ],
            [
                $nomor_urut,
                $request->is_dprd == 'dprd' ? 'DPRD' : 'Setwan',
                $this->getBulanRomawi(date('m')),
                session('tahun')
            ],
            $config_no_spt
        );

        $spt = new SPT();
        $spt->tahun = session('tahun');
        $spt->ub_status = $request->has('ub_status') && $request->ub_status == 'on' ? 'Y' : 'N';
        $spt->penandatangan_id = $request->penandatangan_id;
        $spt->penandatangan_tanggal = $request->penandatangan_tanggal;
        $spt->penandatangan_lokasi = $request->penandatangan_lokasi;
        $spt->nomor = $no_spt;
        $spt->nomor_urut = $nomor_urut;
        $spt->is_dprd = $request->is_dprd == 'dprd' ? true : false;
        $spt->sub_kegiatan_id = $request->sub_kegiatan_id;
        $spt->jenis_sppd_id = $request->jenis_sppd_id;
        $spt->bidang_sub_id = $request->sub_bidang_id;
        $spt->tanggal_berangkat = $request->tanggal_berangkat;
        $spt->tanggal_kembali = $request->tanggal_kembali;
        $spt->save();
        foreach ($request->dasar as $d) {
            $dasar = new SPTDasar();
            $dasar->spt_id = $spt->id;
            $dasar->uraian = $d['uraian'];
            $dasar->save();
        }
        foreach ($request->untuk as $u) {
            $untuk = new SPTUntuk();
            $untuk->spt_id = $spt->id;
            $untuk->uraian = $u['uraian'];
            $untuk->save();
        }
        foreach ($request->pegawai as $p) {
            $pegawai = new SPTPegawai();
            $pegawai->spt_id = $spt->id;
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
    public function edit(string $id) {}

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
