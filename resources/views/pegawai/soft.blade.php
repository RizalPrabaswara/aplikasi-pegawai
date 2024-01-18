@extends('layouts.main')

@section('judul')
    Halaman Data Sampah Pegawai
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-primary" type="button" onclick="window.location='/pegawai/index'">Kembali ke
                    Index</button>
            </h3>
        </div>

        <div class="card-body">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Pegawai</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Tanggal lahir</th>
                        <th scope="col">Action Pages</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPegawai as $pegawai)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pegawai->nomorpegawai }}</td>
                            <td>{{ $pegawai->nama }}</td>
                            <td>{{ $pegawai->alamat }}</td>
                            <td>{{ $pegawai->agama }}</td>
                            <td>{{ $pegawai->ulangtahun }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" type="button"
                                    onclick="restore('{{ $pegawai->id }}')">Restore</button>
                                <form action="/pegawai/forceDelete/{{ $pegawai->id }}" method="POST"
                                    style="display:inline;" onsubmit="return hapusData()">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">Hapus Dari Database</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
                function restore(id) {
                    pesan = confirm('Apakah Anda Yakin Ingin Dikembalikan ?');
                    if (pesan) {
                        window.location = '/pegawai/restore/' + id;
                    }
                }

                function hapusData() {
                    pesan = confirm('Apakah Anda Benar Ingin Menghapus Data ?');
                    if (pesan) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
        </div>
    </div>
@endsection
