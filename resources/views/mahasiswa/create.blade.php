@extends('layout.template')

@section('konten')
    <!-- START FORM -->
    <form action="{{ route('mahasiswa.store') }}" method='post' enctype="multipart/form-data">
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
                <label for="nama" class="col-sm-2 col-form-label">Pilih Universitas</label>
                <div class="col-sm-10">
                    <select class="form-control select" name="universitas_id" id="universitas_id">
                        @foreach ($univ as $univ)
                            <option value="{{ $univ->id }}">{{ $univ->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nim' id="nim">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='umur' id="umur">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' id="alamat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_telp" class="col-sm-2 col-form-label">Nomor Telpon</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='no_telp' id="no_telp">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tanggal_lahir' id="tanggal_lahir">
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                            value="Laki-Laki">
                        <label class="form-check-label" for="jenis_kelamin1">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                            value="Perempuan">
                        <label class="form-check-label" for="jenis_kelamin2">
                            Perempuan
                        </label>
                    </div>
            </fieldset>
            <div class="mb-3">
                <label for="gambar" class="form-label">Masukkan Gambar</label>
                <input class="form-control form-control-sm" name='gambar'id="gambar" type="file">
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
