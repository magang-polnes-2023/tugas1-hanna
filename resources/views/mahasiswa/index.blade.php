@extends('layout.template')

@section('konten')
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href={{ route('mahasiswa.create') }} class="btn btn-primary">+ Tambah Data</a>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Nama Universitas</th>
                    <th class="col-md-2">Gambar</th>
                    <th class="col-md-2">Nama</th>
                    <th class="col-md-2">NIM</th>
                    <th class="col-md-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($mahasiswa->count() > 0)
                    @foreach ($mahasiswa as $data)
                        <tr>
                            <td class="text-middle">{{ $loop->iteration }}</td>
                            <td class="text-middle">{{ $data->universitas->nama }}</td>
                            <td class="text-middle">
                                <img src="{{ asset('/storage/posts/' . $data->gambar) }}" class="rounded"
                                    style="width:70px">
                            </td>
                            <td class="text-middle">{{ $data->nama }}</td>
                            <td class="text-middle">{{ $data->nim }}</td>
                            <td>
                                <form onsubmit="return confirm('Menghapus Data?');"
                                    action="{{ route('mahasiswa.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('mahasiswa.edit', $data->id) }}" type="button"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('mahasiswa.show', $data->id) }}" type="button"
                                        class="btn btn-dark btn-sm">Show</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submin" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="6">Tidak Ada Data Mahasiswa</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- AKHIR DATA -->
@endsection
