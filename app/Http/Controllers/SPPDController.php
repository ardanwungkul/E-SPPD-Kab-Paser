<?php

namespace App\Http\Controllers;

use App\Models\SPPD;
use App\Models\SPT;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SPPDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->lembaga == 'dprd') {
                $data = SPT::where('tahun', session('tahun'))->orderBy('nomor_urut', 'desc')->where('is_dprd', true)->get();
            } else {
                $data = SPT::where('tahun', session('tahun'))->orderBy('nomor_urut', 'desc')->where('is_dprd', false)->get();
            }
            return DataTables::of($data)->addIndexColumn()->make(true);
        }

        return view('master.sppd.index');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

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
}
