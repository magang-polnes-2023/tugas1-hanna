@extends('layout.template')

@section('konten')
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('universitas') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href="{{ route('universitas.create') }}" class="btn btn-primary">+ Tambah Data</a>
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
                    <th class="col-md-2">Nama</th>
                    <th class="col-md-2">Alamat</th>
                    <th class="col-md-2">Email</th>
                    <th class="col-md-2">Akreditas</th>
                    <th class="col-md-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($universitas->count() > 0)
                    @foreach ($universitas as $data)
                        <tr>
                            <td class="text-middle">{{ $loop->iteration }}</td>
                            <td class="text-middle">{{ $data->nama }}</td>
                            <td class="text-middle">{{ $data->alamat }}</td>
                            <td class="text-middle">{{ $data->email }}</td>
                            <td class="text-middle">{{ $data->akreditas }}</td>
                            <td>
                                <form onsubmit="return confirm('Menghapus Data?');"
                                    action="{{ route('universitas.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('universitas.edit', $data->id) }}" type="button"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('universitas.show', $data->id) }}" type="button"
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
                        <td class="text-center" colspan="6">Tidak Ada Data Universitas</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- AKHIR DATA -->
@endsection
