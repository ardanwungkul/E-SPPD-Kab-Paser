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
    public function __construct()
    {
        $this->middleware('permission:Daftar Pegawai', ['only' => ['index']]);
        $this->middleware('permission:Tambah Pegawai', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Pegawai', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Pegawai', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::with('pangkat')
            ->join('ref_pangkat', 'pegawai.pangkat_id', '=', 'ref_pangkat.id')
            ->orderBy('ref_pangkat.jenis_pegawai_id', 'asc')
            ->orderBy('ref_pangkat.kode_golongan', 'desc')
            ->orderBy('nama', 'asc')
            ->select('pegawai.*')
            ->get();
        return view('master.pegawai.index', compact('data'));
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
                'nip' => 'required|max:21',
                'nama' => 'required|max:70',
                'pangkat_id' => 'required',
                'bidang_id' => 'required',
                'tingkat_id' => 'required',
                'jabatan' => 'required|max:70',
                'no_hp' => 'max:30',
                'keterangan' => 'max:70',
            ],
            [
                'nip.required' => 'Kolom NIP Wajib Diisi.',
                'nama.required' => 'Kolom Nama Wajib Diisi.',
                'jabatan.required' => 'Kolom Jabatan Wajib Diisi.',
                'pangkat_id.required' => 'Anda Perlu Memilih Pangkat.',
                'bidang_id.required' => 'Anda Perlu Memilih ' . session('config')->judul . '.',
                'tingkat_id.required' => 'Anda Perlu Memilih Tingkat.',
                'nip.max' => 'Maksimal NIP adalah 21 Karakter',
                'nama.max' => 'Maksimal Nama adalah 70 Karakter',
                'jabatan.max' => 'Maksimal Nama adalah 70 Karakter',
                'no_hp.max' => 'Maksimal Nama adalah 30 Karakter',
                'keterangan.max' => 'Maksimal Nama adalah 70 Karakter',
            ]
        );
        $pegawai = new Pegawai();
        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->pangkat_id = $request->pangkat_id;
        $pegawai->bidang_id = $request->bidang_id;
        $pegawai->bidang_sub_id = $request->sub_bidang_id;
        $pegawai->tingkat_id = $request->tingkat_id;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->alamat = $request->alamat;
        $pegawai->keterangan = $request->keterangan;
        $pegawai->ttd_default = $request->has('ttd_default') && $request->ttd_default == 'on' ? 'Y' : 'N';
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
                'nip' => 'required|max:21',
                'nama' => 'required|max:70',
                'pangkat_id' => 'required',
                'bidang_id' => 'required',
                'tingkat_id' => 'required',
                'jabatan' => 'required|max:70',
                'no_hp' => 'max:30',
                'keterangan' => 'max:70',
            ],
            [
                'nip.required' => 'Kolom NIP Wajib Diisi.',
                'nama.required' => 'Kolom Nama Wajib Diisi.',
                'jabatan.required' => 'Kolom Jabatan Wajib Diisi.',
                'pangkat_id.required' => 'Anda Perlu Memilih Pangkat.',
                'bidang_id.required' => 'Anda Perlu Memilih ' . session('config')->judul . '.',
                'tingkat_id.required' => 'Anda Perlu Memilih Tingkat.',
                'nip.max' => 'Maksimal NIP adalah 21 Karakter',
                'nama.max' => 'Maksimal Nama adalah 70 Karakter',
                'jabatan.max' => 'Maksimal Nama adalah 70 Karakter',
                'no_hp.max' => 'Maksimal Nama adalah 30 Karakter',
                'keterangan.max' => 'Maksimal Nama adalah 70 Karakter',
            ]
        );
        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->pangkat_id = $request->pangkat_id;
        $pegawai->bidang_id = $request->bidang_id;
        $pegawai->bidang_sub_id = $request->sub_bidang_id;
        $pegawai->tingkat_id = $request->tingkat_id;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->alamat = $request->alamat;
        $pegawai->keterangan = $request->keterangan;
        $pegawai->ttd_default = $request->has('ttd_default') && $request->ttd_default == 'on' ? 'Y' : 'N';
        $pegawai->aktif = $request->has('aktif') && $request->aktif == 'on' ? 'Y' : 'N';
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
