@extends('layout.template')

@section('konten')
    <!-- START FORM -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <h1 class="mb-0">Detail Data</h1>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('storage/posts/' . $mahasiswa->gambar) }}" class="w-50 rounded">
                    </div>
                    <hr>
                    <h4>Nama : {{ $mahasiswa->nama }}</h4>
                    <p class="tmt-3">
                        NIM : {!! $mahasiswa->nim !!}
                    </p>
                    <p class="tmt-3">
                        Umur : {!! $mahasiswa->umur !!}
                    </p>
                    <p class="tmt-3">
                        Alamat : {!! $mahasiswa->alamat !!}
                    </p>
                    <p class="tmt-3">
                        Nomor Telpon : {!! $mahasiswa->no_telp !!}
                    </p>
                    <p class="tmt-3">
                        Tanggal Lahir : {!! $mahasiswa->tanggal_lahir !!}
                    </p>
                    <p class="tmt-3">
                        Jenis Kelamin : {!! $mahasiswa->jenis_kelamin !!}
                    </p>
                    <div class="d-grid">
                        <button onclick="history.back()" class="btn btn-secondary">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR FORM -->
@endsection
