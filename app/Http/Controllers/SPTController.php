<?php

namespace App\Http\Controllers;

use App\Models\NotaDinas;
use App\Models\Pegawai;
use App\Models\SPT;
use App\Models\SPTDasar;
use App\Models\SPTPegawai;
use App\Models\SPTUntuk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SPTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DB::enableQueryLog();
        $data = NotaDinas::where('tahun', session('tahun'))->where('status', '!=', "0")->orderBy('nomor', 'desc')->get();
        // dd(DB::getQueryLog());
        return view('master.spt.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pegawai = Pegawai::with('pangkat')
            ->join('ref_pangkat', 'pegawai.pangkat_id', '=', 'ref_pangkat.id')
            ->orderBy('ref_pangkat.jenis_pegawai')
            ->orderBy('ref_pangkat.kode_golongan')
            ->orderBy('ref_pangkat.uraian')
            ->select('pegawai.*')
            ->get();
        if ($request->nota_dinas) {
            $nota_dinas = NotaDinas::find($request->nota_dinas);
            if ($nota_dinas) {
                return view('master.spt.create', compact('nota_dinas', 'pegawai'));
            } else {
                return redirect()->route('spt.create');
            }
        } else {
            return view('master.spt.create', compact('pegawai'));
        }
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
            ],
            [
                'dasar.required' => 'Minimal harus Mengisi 1 Dasar!',
                'pegawai.required' => 'Minimal harus Mengisi 1 Pegawai!',
                'untuk.required' => 'Minimal harus Mengisi 1 Untuk!',
                'penandatangan_id.required' => 'Penandatangan Wajib di Isi!',
                'penandatangan_tanggal.required' => 'Tanggal Penandatangan Wajib di Isi!',
                'penandatangan_lokasi.required' => 'Lokasi Penandatangan Wajib di Isi!',
            ]
        );
        $nota_dinas = NotaDinas::find($request->nota_dinas);
        $config_no_spt = session('config')->no_spt;
        $no_spt = str_replace(['{nomor_urut}', '{tahun}'], [$nota_dinas->nomor, session('tahun')], $config_no_spt);

        $spt = new SPT();
        $spt->nota_dinas_id = $nota_dinas->id;
        $spt->penandatangan_tanggal = $request->penandatangan_tanggal;
        $spt->penandatangan_lokasi = $request->penandatangan_lokasi;
        $spt->penandatangan_id = $request->penandatangan_id;
        $spt->nomor = $no_spt;
        $spt->ub_status = $request->has('ub_status') && $request->ub_status == 'on' ? 'Y' : 'N';
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

        $pdf = Pdf::loadView('master.spt.pdf', compact('spt'));
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
