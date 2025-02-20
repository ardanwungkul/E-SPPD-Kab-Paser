<?php

namespace App\Http\Controllers;

use App\Models\JenisPerjalanan;
use App\Models\Provinsi;
use App\Models\StandarUangHarian;
use App\Models\TingkatPerjalananDinas;
use Illuminate\Http\Request;

class StandarUangHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
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
    public function edit(StandarUangHarian $standarUangHarian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StandarUangHarian $standarUangHarian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StandarUangHarian $standarUangHarian)
    {
        //
    }
}
