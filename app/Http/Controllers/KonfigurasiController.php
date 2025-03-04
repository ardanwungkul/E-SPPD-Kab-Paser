<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Preferensi;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Konfigurasi', ['only' => ['index']]);
        $this->middleware('permission:Edit Konfigurasi', ['only' => ['store', 'storePreferensi']]);
    }
    public function index()
    {
        $config = Config::where('aktif', 'Y')->where('tahun', session('tahun'))->first();
        $provinsi = Provinsi::select('id', 'nama')->get();
        $preferensi = Preferensi::first();
        return view('master.config.index', compact('config', 'preferensi', 'provinsi'));
    }
    private function containsNomorUrutAndTahun($value)
    {
        if ($value && $value !== '') {
            return strpos($value, '{nomor_urut}') !== false && strpos($value, '{tahun}') !== false;
        }
        return true;
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'no_spt' => ['required', 'max:30', function ($attribute, $value, $fail) {
                    if (!$this->containsNomorUrutAndTahun($value)) {
                        $fail("Nomor SPT harus mengandung {nomor_urut} dan {tahun}. ");
                    }
                }],
                'no_sppd' => ['required', 'max:30', function ($attribute, $value, $fail) {
                    if (!$this->containsNomorUrutAndTahun($value)) {
                        $fail("Nomor SPPD harus mengandung {nomor_urut} dan {tahun}. ");
                    }
                }],
                'no_spj' => ['max:30', function ($attribute, $value, $fail) {
                    if (!$this->containsNomorUrutAndTahun($value)) {
                        $fail("Nomor SPJ harus mengandung {nomor_urut} dan {tahun}.");
                    }
                }]
            ],
            [
                'no_spt.max' => 'Nomor SPT tidak boleh lebih dari 30 karakter.',
                'no_sppd.max' => 'Nomor SPPD tidak boleh lebih dari 30 karakter.',
                'no_spj.max' => 'Nomor SPJ tidak boleh lebih dari 30 karakter.',
            ]
        );
        $config = Config::where('aktif', 'Y')->where('tahun', session('tahun'))->first();
        $config->no_spt = $request->no_spt;
        $config->no_sppd = $request->no_sppd;
        $config->no_spj = $request->no_spj;
        $config->judul = $request->judul;
        $config->save();
        $request->session()->put('config', $config);

        return redirect()->back()->with(['success' => 'Berhasil Mengubah Konfigurasi']);
    }

    public function storePreferensi(Request $request)
    {
        $preferensi = Preferensi::first();
        $preferensi->nama_aplikasi = $request->nama_aplikasi;
        $preferensi->instansi_pemerintah = $request->instansi_pemerintah;
        $preferensi->instansi_alamat = $request->instansi_alamat;
        $preferensi->instansi_kontak_email = $request->instansi_kontak_email;
        $preferensi->instansi_kontak_fax = $request->instansi_kontak_fax;
        $preferensi->instansi_kontak_telp = $request->instansi_kontak_telp;
        $preferensi->instansi_provinsi = $request->instansi_provinsi;
        $preferensi->instansi_kabupaten_kota = $request->instansi_kabupaten_kota;
        $preferensi->save();

        $request->session()->put('preferensi', $preferensi);

        return redirect()->back()->with('success', 'Preferensi berhasil diperbarui!');
    }
}
