@extends('layout.template')

@section('konten')
    <!-- START FORM -->
    <form action="{{ route('universitas.store') }}" method='post' enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert" id="danger-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                setTimeout(function() => {
                    var succsesAlert = document.getElementById('danger-alert');
                    succsesAlert.style.display = 'none';
                }, 5000);
            </script>
        @endif
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' id="alaamt">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_telp" class="col-sm-2 col-form-label">Nomor Telpon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='no_telp' id="no_telp">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='email' id="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="akreditas" class="col-sm-2 col-form-label">Akreditas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='akreditas' id="akreditas">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
