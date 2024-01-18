@extends('layouts.main')

@section('judul')
    Halaman Create Pegawai
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-primary" type="button" onclick="window.location='/pegawai/index'">Kembali Ke Halaman
                    Utama</button>
            </h3>
        </div>

        <div class="card-body">

            <form action="{{ url('/pegawai/simpan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-sm table-striped">
                    <tr>
                        <td>Nomor Pegawai:</td>
                        <td><input type="text" name="nomorpegawai" id="nomorpegawai"
                                class="form-control form-control-sm @error('nomorpegawai') is-invalid @enderror"
                                value="{{ old('nomorpegawai') }}" autofocus>
                            @error('nomorpegawai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Pegawai:</td>
                        <td><input type="text" name="nama" id="nama"
                                class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}"> @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Pegawai:</td>
                        <td>
                            <textarea name="alamat" id="alamat" cols="30" rows="10"
                                class="form-controlform-control-sm @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Agama Pegawai:</td>
                        <td>
                            <select class="js-example-basic-single form-control @error('agama') is-invalid @enderror"
                                name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                                @error('agama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir Pegawai:</td>
                        <td><input type="date" name="ulangtahun" id="ulangtahun"
                                class="form-control form-control-sm @error('ulangtahun') is-invalid @enderror">
                            @error('ulangtahun')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Upload Foto :</td>
                        <td><input type="file" name="foto" id="foto"
                                class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
