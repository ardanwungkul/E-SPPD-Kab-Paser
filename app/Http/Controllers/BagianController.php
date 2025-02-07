<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BagianController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Daftar Ref Bagian', ['only' => ['index']]);
        $this->middleware('permission:Tambah Ref Bagian', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Ref Bagian', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Hapus Ref Bagian', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = \App\Models\User::all();
        return view('master.bagian.index', compact('data'));
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
