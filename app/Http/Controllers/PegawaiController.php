<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'dataPegawai' => Pegawai::all()
        ];
        return view('pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawaiRequest $request)
    {
        $nomorpegawai = $request->nomorpegawai;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $agama = $request->agama;
        $ulangtahun = $request->ulangtahun;

        try {
            $pegawai = new Pegawai();
            $pegawai->nomorpegawai = $nomorpegawai;
            $pegawai->nama = $nama;
            $pegawai->alamat = $alamat;
            $pegawai->agama = $agama;
            $pegawai->ulangtahun = $ulangtahun;
            $pegawai->save();

            echo 'Data Disimpan';
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
