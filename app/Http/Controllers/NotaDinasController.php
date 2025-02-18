<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\JenisPerjalanan;
use App\Models\NotaDinas;
use App\Models\NotaDinasDisposisi;
use App\Models\NotaDinasLampiran;
use App\Models\Pegawai;
use App\Models\Program;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class NotaDinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DB::enableQueryLog();
        $data = NotaDinas::where('tahun', session('tahun'))->orderBy('nomor', 'desc')->get();
        // dd(DB::getQueryLog());
        return view('master.nota-dinas.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nomor = NotaDinas::generateNomorUrut(session('tahun'));
        $program = Program::all();
        $jenis = JenisPerjalanan::all();
        $bidang = Bidang::all();
        $pegawai = Pegawai::with('pangkat')
            ->join('ref_pangkat', 'pegawai.pangkat_id', '=', 'ref_pangkat.id')
            ->orderBy('ref_pangkat.jenis_pegawai')
            ->orderBy('ref_pangkat.kode_golongan')
            ->orderBy('ref_pangkat.uraian')
            ->select('pegawai.*')
            ->get();
        return view('master.nota-dinas.create', compact('program', 'jenis', 'bidang', 'nomor', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'sub_bidang_id' => 'required',
                'sub_kegiatan_id' => 'required',
                'jenis_sppd_id' => 'required',
                'tanggal' => 'required',
                'pegawai_id_dari' => 'required',
                'pegawai_id_kepada' => 'required',
                'perihal' => 'required',
                'isi' => 'required',
                'nomor' => [
                    'required',
                    Rule::unique('transaksi_nota_dinas')->where('tahun', session('tahun')),
                ],
            ],
            [
                'nomor.unique' => 'Nomor Sudah Digunakan',
                'pegawai_id_dari.required' => 'Pegawai dari Wajib Diisi',
                'pegawai_id_untuk.required' => 'Pegawai untuk Wajib Diisi'
            ]
        );


        $nota_dinas = new NotaDinas();
        $nota_dinas->sub_bidang_id = $request->sub_bidang_id;
        $nota_dinas->sub_kegiatan_id = $request->sub_kegiatan_id;
        $nota_dinas->jenis_sppd_id = $request->jenis_sppd_id;
        $nota_dinas->tanggal = $request->tanggal;
        $nota_dinas->pegawai_id_dari = $request->pegawai_id_dari;
        $nota_dinas->pegawai_id_kepada = $request->pegawai_id_kepada;
        $nota_dinas->perihal = $request->perihal;
        $nota_dinas->isi = $request->isi;
        $nota_dinas->nomor = $request->nomor;
        $nota_dinas->tahun = session('tahun');
        $nota_dinas->save();

        if ($request->has('lampiran')) {
            foreach ($request->file('lampiran') as $key => $fileArray) {
                foreach ($fileArray as $lampiran) {
                    $nama_file = time() . '_' . mt_rand(100, 999) . '_' . $lampiran->getClientOriginalName();
                    $lampiran->storeAs('public/uploads/dokumen/lampiran/nota-dinas', $nama_file);

                    $notaDinasLampiran = new NotaDinasLampiran();
                    $notaDinasLampiran->nota_dinas_id = $nota_dinas->id;
                    $notaDinasLampiran->lampiran = 'uploads/dokumen/lampiran/nota-dinas/' . $nama_file;
                    $notaDinasLampiran->save();
                }
            }
        }


        return redirect()->route('nota-dinas.show', $nota_dinas->id)->with(['success' => 'Berhasil Membuat Nota Dinas']);
    }

    /**
     * Display the specified resource.
     */
    public function show(NotaDinas $nota_dinas)
    {
        return view('master.nota-dinas.show', compact('nota_dinas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotaDinas $nota_dinas)
    {
        $program = Program::all();
        $jenis = JenisPerjalanan::all();
        $bidang = Bidang::all();
        $pegawai = Pegawai::with('pangkat')
            ->join('ref_pangkat', 'pegawai.pangkat_id', '=', 'ref_pangkat.id')
            ->orderBy('ref_pangkat.jenis_pegawai')
            ->orderBy('ref_pangkat.kode_golongan')
            ->orderBy('ref_pangkat.uraian')
            ->select('pegawai.*')
            ->get();
        return view('master.nota-dinas.edit', compact('program', 'jenis', 'bidang', 'pegawai', 'nota_dinas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotaDinas $nota_dinas)
    {
        $request->validate([
            'sub_bidang_id' => 'required',
            'sub_kegiatan_id' => 'required',
            'jenis_sppd_id' => 'required',
            'tanggal' => 'required',
            'pegawai_id_dari' => 'required',
            'pegawai_id_kepada' => 'required',
            'perihal' => 'required',
            'isi' => 'required',
            'nomor' => [
                'required',
                Rule::unique('transaksi_nota_dinas')->where('tahun', session('tahun'))->ignore($nota_dinas->id),
            ],
        ]);

        $nota_dinas->sub_bidang_id = $request->sub_bidang_id;
        $nota_dinas->sub_kegiatan_id = $request->sub_kegiatan_id;
        $nota_dinas->jenis_sppd_id = $request->jenis_sppd_id;
        $nota_dinas->tanggal = $request->tanggal;
        $nota_dinas->pegawai_id_dari = $request->pegawai_id_dari;
        $nota_dinas->pegawai_id_kepada = $request->pegawai_id_kepada;
        $nota_dinas->perihal = $request->perihal;
        $nota_dinas->isi = $request->isi;
        $nota_dinas->nomor = $request->nomor;
        $nota_dinas->save();

        return redirect()->route('nota-dinas.show', $nota_dinas->id)->with(['success' => 'Berhasil Mengubah Nota Dinas']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotaDinas $nota_dinas)
    {
        if ($nota_dinas->lampiran->count() > 0) {
            foreach ($nota_dinas->lampiran as $lampiran) {
                $path = public_path('storage/' . $lampiran->lampiran);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        $nota_dinas->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Nota Dinas']);
    }
    public function print(NotaDinas $nota_dinas)
    {

        $pdf = Pdf::loadView('master.nota-dinas.pdf', compact('nota_dinas'));
        $pdf->setOptions([
            'defaultFont' => 'Times New Roman',
            'margin_top' => 50,
            'margin_right' => 30,
            'margin_bottom' => 50,
            'margin_left' => 30,
        ]);
        $pdf->setPaper('A4');
        return $pdf->download('Nota Dinas - ' . $nota_dinas->nomor . '.pdf');
    }
    public function disposisiCreate(NotaDinas $nota_dinas)
    {
        return view('master.nota-dinas.disposisi.create', compact('nota_dinas'));
    }
    public function disposisiStore(Request $request, NotaDinas $nota_dinas)
    {
        $request->validate([
            'lampiran' => 'required'
        ]);
        $disposisi = new NotaDinasDisposisi();
        $disposisi->nota_dinas_id = $nota_dinas->id;
        $disposisi->keterangan = $request->keterangan;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $nama_file = time() . '_' . mt_rand(100, 999) . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/dokumen/disposisi', $nama_file);
            $disposisi->lampiran = 'uploads/dokumen/disposisi/' . $nama_file;
        }
        $disposisi->save();

        $nota_dinas->status = "1";
        $nota_dinas->save();
        return redirect()->route('nota-dinas.index')->with(['success' => 'Berhasil Menambahkan Bukti Berkas Disposisi']);
    }
}
