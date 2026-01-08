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
    public function index()
    {
        $provinsi = Provinsi::select('id', 'nama')->get();
        $preferensi = Preferensi::first();
        return view('master.config.index', compact('preferensi', 'provinsi'));
    }
    public function formatindex()
    {
        $config = Config::where('aktif', 'Y')->where('tahun', session('tahun'))->first();
        return view('master.format-nomor.index', compact('config'));
    }
    public function kopindex()
    {
        $kop_surat = KopSurat::first();
        return view('master.kop-surat.index', compact('kop_surat'));
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
    private function formatKwitansi($value)
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
                'no_kwitansi' => ['required', 'max:100', function ($attribute, $value, $fail) {
                    if (!$this->formatKwitansi($value)) {
                        $fail("Nomor Kwitansi harus mengandung {nomor_urut} dan {tahun}. ");
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
                'no_kwitansi.max' => 'Nomor SPPD tidak boleh lebih dari 100 karakter.',
                'no_spj.max' => 'Nomor SPJ tidak boleh lebih dari 100 karakter.',
            ]
        );
        $config = Config::where('aktif', 'Y')->where('tahun', session('tahun'))->first();
        $config->no_spt = $request->no_spt;
        $config->no_sppd = $request->no_sppd;
        $config->no_kwitansi = $request->no_kwitansi;
        $config->no_spj = $request->no_spj;
        // $config->judul = $request->judul;
        $config->save();
        $request->session()->put('config', $config);

        return redirect()->back()->with(['success' => 'Berhasil Mengubah Konfigurasi']);
    }

    public function storePreferensi(Request $request)
    {
        $preferensi = Preferensi::first();
        $preferensi->appname = $request->appname;
        // $preferensi->instansi_pemerintah = $request->instansi_pemerintah;
        // $preferensi->instansi_alamat = $request->instansi_alamat;
        // $preferensi->instansi_kontak_email = $request->instansi_kontak_email;
        // $preferensi->instansi_kontak_fax = $request->instansi_kontak_fax;
        // $preferensi->instansi_kontak_telp = $request->instansi_kontak_telp;
        // $preferensi->instansi_provinsi = $request->instansi_provinsi;
        // $preferensi->instansi_kabupaten_kota = $request->instansi_kabupaten_kota;
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

            // Hapus logo lama jika ada
            if ($kop_surat->dprd_logo) {
                $oldPath = public_path($kop_surat->dprd_logo);

                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('dprd_logo');
            $fileName = time() . '_' . mt_rand(100, 999) . '_' . mt_rand(100, 999) . '.' . $file->getClientOriginalExtension();

            $uploadPath = public_path('uploads/gambar/kop_surat');

            // Buat folder jika belum ada
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Simpan file
            $file->move($uploadPath, $fileName);

            // Simpan path ke database
            $kop_surat->dprd_logo = 'uploads/gambar/kop_surat/' . $fileName;
        }

        $kop_surat->setwan_header_1 = $request->setwan_header_1;
        $kop_surat->setwan_header_2 = $request->setwan_header_2;
        $kop_surat->setwan_header_3 = $request->setwan_header_3;
        $kop_surat->setwan_header_4 = $request->setwan_header_4;
        if ($request->hasFile('setwan_logo')) {

            // Hapus logo lama jika ada
            if ($kop_surat->setwan_logo) {
                $oldPath = public_path($kop_surat->setwan_logo);

                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('setwan_logo');
            $fileName = time() . '_' . mt_rand(100, 999) . '_' . mt_rand(100, 999) . '.' . $file->getClientOriginalExtension();

            $uploadPath = public_path('uploads/gambar/kop_surat');

            // Buat folder jika belum ada
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Simpan file
            $file->move($uploadPath, $fileName);

            // Simpan path ke database
            $kop_surat->setwan_logo = 'uploads/gambar/kop_surat/' . $fileName;
        }
        $kop_surat->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengubah Kop Surat']);
    }
}
