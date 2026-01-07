<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Golongan;
use App\Models\JenisPegawai;
use App\Models\Pegawai;
use App\Models\TingkatPerjalananDinas;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::with('pangkat')
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

        $jenis_pegawai = JenisPegawai::all();
        $pangkat = Golongan::all();
        return view('master.pegawai.index', compact('data', 'jenis_pegawai', 'pangkat'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_pegawai = JenisPegawai::all();
        $tingkat = TingkatPerjalananDinas::all();
        $bidang = Bidang::where('tahun', session('tahun'))->get();
        return view('master.pegawai.create', compact('tingkat', 'jenis_pegawai', 'bidang'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nip' => 'max:21',
                'nama' => 'required|max:70',
                'bidang_id' => 'required',
                'sub_bidang_id' => 'required',
                'jabatan' => 'max:70',
                'no_hp' => 'max:30',
                'keterangan' => 'max:70',
            ],
            [
                'nip.required' => 'Kolom NIP Wajib Diisi.',
                'nama.required' => 'Kolom Nama Wajib Diisi.',
                'jabatan.required' => 'Kolom Jabatan Wajib Diisi.',
                'pangkat_id.required' => 'Anda Perlu Memilih Pangkat.',
                'bidang_id.required' => 'Anda Perlu Memilih ' . session('config')->judul . '.',
                'sub_bidang_id.required' => 'Anda Perlu Memilih Sub. Bidang.',
                'tingkat_id.required' => 'Anda Perlu Memilih Tingkat.',
                'nip.max' => 'Maksimal NIP adalah 21 Karakter',
                'nama.max' => 'Maksimal Nama adalah 70 Karakter',
                'jabatan.max' => 'Maksimal Nama adalah 70 Karakter',
                'no_hp.max' => 'Maksimal Nama adalah 30 Karakter',
                'keterangan.max' => 'Maksimal Nama adalah 70 Karakter',
            ]
        );
        $pegawai = new Pegawai();
        $pegawai->nip = $request->nip ?? '';
        $pegawai->nama = $request->nama;
        $pegawai->jnspeg_id = $request->jenis_pegawai_id;
        $pegawai->pangkat_id = $request->pangkat_id ?? 0;
        $pegawai->bidang_id = $request->bidang_id ?? 0;
        $pegawai->bidang_sub_id = $request->sub_bidang_id ?? 0;
        $pegawai->tingkat_id = $request->tingkat_id ?? 0;
        $pegawai->nomor_hp = $request->no_hp ?? '';
        $pegawai->jabatan = $request->jabatan ?? '';
        $pegawai->alamat = $request->alamat ?? '';
        $pegawai->keterangan = $request->keterangan ?? '';
        $pegawai->ststtd = $request->has('ttd_default') && $request->ttd_default == 'on' ? 'Y' : 'T';
        $pegawai->aktif = 'Y';
        $pegawai->save();
        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Menambahkan Pegawai']);
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
    public function edit(Pegawai $pegawai)
    {
        $jenis_pegawai = JenisPegawai::all();
        $tingkat = TingkatPerjalananDinas::all();
        $bidang = Bidang::where('tahun', session('tahun'))->get();
        return view('master.pegawai.edit', compact('pegawai', 'tingkat', 'jenis_pegawai', 'bidang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate(
            [
                'nip' => 'max:21',
                'nama' => 'required|max:70',
                'bidang_id' => 'required',
                'sub_bidang_id' => 'required',
                'jabatan' => 'max:70',
                'no_hp' => 'max:30',
                'keterangan' => 'max:70',
            ],
            [
                'nip.required' => 'Kolom NIP Wajib Diisi.',
                'nama.required' => 'Kolom Nama Wajib Diisi.',
                'jabatan.required' => 'Kolom Jabatan Wajib Diisi.',
                'pangkat_id.required' => 'Anda Perlu Memilih Pangkat.',
                'bidang_id.required' => 'Anda Perlu Memilih ' . session('config')->judul . '.',
                'sub_bidang_id.required' => 'Anda Perlu Memilih Sub. Bidang.',
                'tingkat_id.required' => 'Anda Perlu Memilih Tingkat.',
                'nip.max' => 'Maksimal NIP adalah 21 Karakter',
                'nama.max' => 'Maksimal Nama adalah 70 Karakter',
                'jabatan.max' => 'Maksimal Nama adalah 70 Karakter',
                'no_hp.max' => 'Maksimal Nama adalah 30 Karakter',
                'keterangan.max' => 'Maksimal Nama adalah 70 Karakter',
            ]
        );
        $pegawai->nip = $request->nip ?? '';
        $pegawai->nama = $request->nama;
        $pegawai->jnspeg_id = $request->jenis_pegawai_id;
        $pegawai->pangkat_id = $request->pangkat_id ?? 0;
        $pegawai->bidang_id = $request->bidang_id ?? 0;
        $pegawai->bidang_sub_id = $request->sub_bidang_id ?? 0;
        $pegawai->tingkat_id = $request->tingkat_id ?? 0;
        $pegawai->nomor_hp = $request->no_hp ?? '';
        $pegawai->jabatan = $request->jabatan ?? '';
        $pegawai->alamat = $request->alamat ?? '';
        $pegawai->keterangan = $request->keterangan ?? '';
        $pegawai->ststtd = $request->has('ttd_default') && $request->ttd_default == 'on' ? 'Y' : 'T';
        $pegawai->aktif = $request->has('aktif') && $request->aktif == 'on' ? 'Y' : 'T';
        $pegawai->save();
        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Mengubah Pegawai']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Menghapus Pegawai']);
    }
}
