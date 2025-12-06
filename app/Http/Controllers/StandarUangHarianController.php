<?php

namespace App\Http\Controllers;

use App\Models\JenisPerjalanan;
use App\Models\Provinsi;
use App\Models\StandarUangHarian;
use App\Models\TingkatPerjalananDinas;
use Illuminate\Http\Request;

class StandarUangHarianController extends Controller
{
    public function index()
    {
        $data = StandarUangHarian::where('tahun', session('tahun'))->get();
        return view('master.standar-uang-harian.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = JenisPerjalanan::all();
        $tingkat = TingkatPerjalananDinas::select('uraian', 'id')->get();
        $provinsi = Provinsi::select('nama', 'id')->get();
        return view('master.standar-uang-harian.create', compact('jenis', 'tingkat', 'provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'jenis_sppd_id' => 'required',
                'provinsi_id' => 'required',
                'tingkat_sppd_id' => 'required',
                'uang_harian' => 'required',
                'batas_biaya_penginapan' => 'required',

            ],
            [
                'jenis_sppd_id.required' => 'Jenis SPPD wajib diisi.',
                'provinsi_id.required' => 'Provinsi wajib diisi.',
                'tingkat_sppd_id.required' => 'Tingkat SPPD wajib diisi.',
                'uang_harian.required' => 'Uang harian wajib diisi.',
                'batas_biaya_penginapan.required' => 'Batas biaya penginapan wajib diisi.',
            ]
        );
        $data = new StandarUangHarian();
        $data->jenis_sppd_id = $request->jenis_sppd_id;
        $data->provinsi_id = $request->provinsi_id;
        $data->kabupaten_id = $request->kabupaten_id;
        $data->kecamatan_id = $request->kecamatan_id;
        $data->tingkat_sppd_id = $request->tingkat_sppd_id;
        $data->uang_harian =  preg_replace('/[^0-9-]/', '', $request->uang_harian);
        $data->batas_biaya_penginapan = preg_replace('/[^0-9-]/', '', $request->batas_biaya_penginapan);
        $data->tahun = session('tahun');
        $data->save();
        return redirect()->route('suh.index')->with(['success' => 'Berhasil Menambahkan Standar Uang Harian']);
    }

    /**
     * Display the specified resource.
     */
    public function show(StandarUangHarian $standarUangHarian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StandarUangHarian $suh)
    {
        $jenis = JenisPerjalanan::all();
        $tingkat = TingkatPerjalananDinas::select('uraian', 'id')->get();
        $provinsi = Provinsi::select('nama', 'id')->get();
        return view('master.standar-uang-harian.edit', compact('jenis', 'tingkat', 'provinsi', 'suh'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StandarUangHarian $suh)
    {
        $request->validate(
            [
                'jenis_sppd_id' => 'required',
                'provinsi_id' => 'required',
                'tingkat_sppd_id' => 'required',
                'uang_harian' => 'required',
                'batas_biaya_penginapan' => 'required',

            ],
            [
                'jenis_sppd_id.required' => 'Jenis SPPD wajib diisi.',
                'provinsi_id.required' => 'Provinsi wajib diisi.',
                'tingkat_sppd_id.required' => 'Tingkat SPPD wajib diisi.',
                'uang_harian.required' => 'Uang harian wajib diisi.',
                'batas_biaya_penginapan.required' => 'Batas biaya penginapan wajib diisi.',
            ]
        );
        $suh->jenis_sppd_id = $request->jenis_sppd_id;
        $suh->provinsi_id = $request->provinsi_id;
        $suh->kabupaten_id = $request->kabupaten_id;
        $suh->kecamatan_id = $request->kecamatan_id;
        $suh->tingkat_sppd_id = $request->tingkat_sppd_id;
        $suh->uang_harian =  preg_replace('/[^0-9-]/', '', $request->uang_harian);
        $suh->batas_biaya_penginapan = preg_replace('/[^0-9-]/', '', $request->batas_biaya_penginapan);
        $suh->save();
        return redirect()->route('suh.index')->with(['success' => 'Berhasil Mengubah Standar Uang Harian']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StandarUangHarian $suh)
    {
        $suh->delete();
        return redirect()->route('suh.index')->with(['success' => 'Berhasil Menghapus Standar Uang Harian']);
    }
}
