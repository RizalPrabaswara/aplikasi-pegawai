@extends('layouts.main')

@section('judul')
    Halaman Data Pegawai
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-primary" type="button" onclick="window.location='/pegawai/tambah'">Tambah Pegawai
                    Baru</button>

                <button class="btn btn-info" type="button" onclick="window.location='/pegawai/datasoft'">Tampilkan Data
                    Terhapus</button>
            </h3>
        </div>

        <div class="card-body">
            <form action="/filter" method="get" class="mb-4">
                <div class="col-md-3">
                    <label for="start">Start Date:</label>
                    <input type="date" name="startDate" id="startDate" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="end">End Date:</label>
                    <input type="date" name="endDate" id="endDate" class="form-control">
                </div>
                <div class="col-md-1 pt-4">
                    <button type="submit" class="btn btn-sm btn-success form-control">Filter</button>
                </div>
            </form>

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
                                <button class="btn btn-sm btn-warning" type="button"
                                    onclick="window.location='/pegawai/edit/{{ $pegawai->id }}'">Edit</button>
                                <form action="/pegawai/hapus/{{ $pegawai->id }}" method="POST" style="display:inline;"
                                    onsubmit="return hapusData()">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
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
