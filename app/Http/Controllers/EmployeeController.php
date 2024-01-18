<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = [
            'dataPegawai' => Pegawai::all()
        ];
        return view('pegawai.index', $data);
    }

    public function filter(Request $r)
    {
        $start = $r->startDate;
        $end = $r->endDate;

        $data = [
            'dataPegawai' => Pegawai::whereDate('ulangtahun', '>=', $start)
                ->whereDate('ulangtahun', '<=', $end)->get()
        ];

        return view('pegawai.index', $data);
    }

    public function datasoft()
    {
        $data = [
            'dataPegawai' => Pegawai::onlyTrashed()->get()
        ];
        return view('pegawai.soft', $data);
    }

    public function restore($id)
    {
        Pegawai::withTrashed()->find($id)->restore();
        return redirect('/pegawai/index');
    }

    public function forceDelete($id)
    {
        $pegawai = Pegawai::withTrashed()->find($id);
        $pathFoto = $pegawai->foto;

        if ($pathFoto != null) {
            Storage::delete($pathFoto);
        }

        Pegawai::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $r)
    {
        $nomorpegawai = $r->nomorpegawai;
        $nama = $r->nama;
        $alamat = $r->alamat;
        $agama = $r->agama;
        $ulangtahun = $r->ulangtahun;

        $validateData = $r->validate([
            'nomorpegawai' => 'required|numeric',
            'nama' => 'required|unique:pegawais,nama',
            'alamat' => 'required',
            'agama' => 'required',
            'ulangtahun' => 'required',
            'foto' => 'mimes:jpg,png,jpeg|image|max:2048',
        ], [
            'nomorpegawai.required' => 'nomor pegawai tidak boleh kosong',
            'nomorpegawai.numeric' => 'nomor pegawai harus angka',
            'nama.required' => 'nama pegawai tidak boleh kosong',
            'nama.unique' => 'nama pegawai sudah ada',
            'alamat.required' => 'alamat pegawai tidak boleh kosong',
            'agama.required' => 'agama pegawai tidak boleh kosong',
            'ulangtahun.required' => 'Tanggal Lahir pegawai tidak boleh kosong',
        ]);

        if ($r->hasFile('foto')) {
            $path = $r->file('foto')->store('upload');
        } else {
            $path = '';
        }

        $pegawai = new Pegawai();
        $pegawai->nomorpegawai = $nomorpegawai;
        $pegawai->nama = $nama;
        $pegawai->alamat = $alamat;
        $pegawai->agama = $agama;
        $pegawai->ulangtahun = $ulangtahun;
        $pegawai->foto = $path;
        $pegawai->save();

        // $r->session()->flash('msg', 'Data ' . $validateData['nama'] . ' Berhasil Tersimpan!');
        return redirect('/pegawai/index');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        $data = [
            'id' => $id,
            'nomorpegawai' => $pegawai->nomorpegawai,
            'nama' => $pegawai->nama,
            'alamat' => $pegawai->alamat,
            'agama' => $pegawai->agama,
            'ulangtahun' => $pegawai->ulangtahun,
            'foto' => $pegawai->foto,
        ];

        return view('pegawai.edit', $data);
    }

    public function update(Request $r)
    {
        $id = $r->id;
        $nomorpegawai = $r->nomorpegawai;
        $nama = $r->nama;
        $alamat = $r->alamat;
        $agama = $r->agama;
        $ulangtahun = $r->ulangtahun;

        $validateData = $r->validate([
            'nomorpegawai' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'ulangtahun' => 'required',
            'foto' => 'mimes:jpg,png,jpeg|image|max:2048',
        ], [
            'nomorpegawai.required' => 'nomor pegawai tidak boleh kosong',
            'nomorpegawai.numeric' => 'nomor pegawai harus angka',
            'nama.required' => 'nama pegawai tidak boleh kosong',
            'alamat.required' => 'alamat pegawai tidak boleh kosong',
            'agama.required' => 'agama pegawai tidak boleh kosong',
            'ulangtahun.required' => 'Tanggal Lahir pegawai tidak boleh kosong',
        ]);

        $pegawai = Pegawai::find($id);
        $pathFoto = $pegawai->foto;
        if ($r->hasFile('foto') && $pathFoto != null) {
            Storage::delete($pathFoto);
            $path = $r->file('foto')->store('upload');
        } else if ($r->hasFile('foto') && $pathFoto == null) {
            $path = $r->file('foto')->store('upload');
        } else {
            $path = '';
        }

        $pegawai->nomorpegawai = $nomorpegawai;
        $pegawai->nama = $nama;
        $pegawai->alamat = $alamat;
        $pegawai->agama = $agama;
        $pegawai->ulangtahun = $ulangtahun;
        $pegawai->foto = $path;
        $pegawai->save();

        // $r->session()->flash('msg', 'Data ' . $nama . ' Berhasil Diubah!');
        return redirect('/pegawai/index');
    }

    public function destroy($id)
    {
        Pegawai::find($id)->delete();
        return redirect('/pegawai/index');
    }
}
