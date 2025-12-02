<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\KopSurat;
use App\Models\Preferensi;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $kop_surat = KopSurat::first();
        $provinsi = Provinsi::select('id', 'nama')->get();
        $preferensi = Preferensi::first();
        return view('master.config.index', compact('config', 'preferensi', 'provinsi', 'kop_surat'));
    }
    private function formatSPT($value)
    {
        if ($value && $value !== '') {
            return strpos($value, '{nomor_urut}') !== false && strpos($value, '{bulan}') !== false && strpos($value, '{lembaga}') !== false && strpos($value, '{tahun}') !== false;
        }
        return true;
    }
    private function formatSPD($value)
    {
        if ($value && $value !== '') {
            return strpos($value, '{nomor_urut}') !== false && strpos($value, '{tahun}') !== false;
        }
        return true;
    }
    private function formatSPJ($value)
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
                'no_spt' => ['required', 'max:100', function ($attribute, $value, $fail) {
                    if (!$this->formatSPT($value)) {
                        $fail("Nomor SPT harus mengandung {nomor_urut}, {bulan}, {lembaga} dan {tahun}. ");
                    }
                }],
                'no_sppd' => ['required', 'max:100', function ($attribute, $value, $fail) {
                    if (!$this->formatSPD($value)) {
                        $fail("Nomor SPPD harus mengandung {nomor_urut} dan {tahun}. ");
                    }
                }],
                'no_spj' => ['max:100', function ($attribute, $value, $fail) {
                    if (!$this->formatSPJ($value)) {
                        $fail("Nomor SPJ harus mengandung {nomor_urut} dan {tahun}.");
                    }
                }]
            ],
            [
                'no_spt.max' => 'Nomor SPT tidak boleh lebih dari 100 karakter.',
                'no_sppd.max' => 'Nomor SPPD tidak boleh lebih dari 100 karakter.',
                'no_spj.max' => 'Nomor SPJ tidak boleh lebih dari 100 karakter.',
            ]
        );
        $config = Config::where('aktif', 'Y')->where('tahun', session('tahun'))->first();
        $config->no_spt = $request->no_spt;
        $config->no_sppd = $request->no_sppd;
        $config->no_spj = $request->no_spj;
        // $config->judul = $request->judul;
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

    public function storeKopSurat(Request $request)
    {
        $request->validate(
            [
                'dprd_header_1' => 'required|max:100',
                'dprd_header_2' => 'required|max:100',
                'dprd_header_3' => 'required|max:100',
                'dprd_header_4' => 'required|max:100',
            ],
            [
                'dprd_header_1.max' => 'Maksimal Karakter yang bisa diinput adalah 100 Karakter',
                'dprd_header_2.max' => 'Maksimal Karakter yang bisa diinput adalah 100 Karakter',
                'dprd_header_3.max' => 'Maksimal Karakter yang bisa diinput adalah 100 Karakter',
                'dprd_header_4.max' => 'Maksimal Karakter yang bisa diinput adalah 100 Karakter'
            ]
        );
        // dd($request);
        $kop_surat = KopSurat::first();
        $kop_surat->dprd_header_1 = $request->dprd_header_1;
        $kop_surat->dprd_header_2 = $request->dprd_header_2;
        $kop_surat->dprd_header_3 = $request->dprd_header_3;
        $kop_surat->dprd_header_4 = $request->dprd_header_4;
        if ($request->hasFile('dprd_logo')) {

            if ($kop_surat->dprd_logo) {
                $old_file_dprd_logo = 'public/' . $kop_surat->dprd_logo;
                if (Storage::exists($old_file_dprd_logo)) {
                    Storage::delete($old_file_dprd_logo);
                }
            }


            $file_dprd = $request->file('dprd_logo');
            $nama_file_dprd = time() . '_' . mt_rand(100, 999) . '_' . mt_rand(100, 999) . '.' . $file_dprd->getClientOriginalExtension();
            $file_dprd->storeAs('public/uploads/gambar/kop_surat', $nama_file_dprd);
            $kop_surat->dprd_logo = 'uploads/gambar/kop_surat/' . $nama_file_dprd;
        }

        $kop_surat->setwan_header_1 = $request->setwan_header_1;
        $kop_surat->setwan_header_2 = $request->setwan_header_2;
        $kop_surat->setwan_header_3 = $request->setwan_header_3;
        $kop_surat->setwan_header_4 = $request->setwan_header_4;
        if ($request->hasFile('setwan_logo')) {

            if ($kop_surat->setwan_logo) {
                $old_file_setwan_logo = 'public/' . $kop_surat->setwan_logo;
                if (Storage::exists($old_file_setwan_logo)) {
                    Storage::delete($old_file_setwan_logo);
                }
            }


            $file_setwan = $request->file('setwan_logo');
            $nama_file_setwan = time() . '_' . mt_rand(100, 999) . '_' . mt_rand(100, 999) . '.' . $file_setwan->getClientOriginalExtension();
            $file_setwan->storeAs('public/uploads/gambar/kop_surat', $nama_file_setwan);
            $kop_surat->setwan_logo = 'uploads/gambar/kop_surat/' . $nama_file_setwan;
        }
        $kop_surat->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengubah Kop Surat']);
    }
}
