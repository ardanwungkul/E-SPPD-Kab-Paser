<?php

namespace App\Http\Controllers;

use App\Models\RiilAnggaran;
use Illuminate\Http\Request;

class RiilAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.realisasi-anggaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(RiilAnggaran $riilAnggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiilAnggaran $riilAnggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RiilAnggaran $riilAnggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiilAnggaran $riilAnggaran)
    {
        //
    }
}
