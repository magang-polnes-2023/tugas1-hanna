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
                    <hr>
                    <h4>Nama : {{ $universitas->nama }}</h4>
                    <p class="tmt-3">
                        Alamat : {!! $universitas->alamat !!}
                    </p>
                    <p class="tmt-3">
                        Nomor Telpon : {!! $universitas->no_telp !!}
                    </p>
                    <p class="tmt-3">
                        Email : {!! $universitas->email !!}
                    </p>
                    <p class="tmt-3">
                        Akreditas : {!! $universitas->akreditas !!}
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
