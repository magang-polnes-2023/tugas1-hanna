@extends('layout.template')

@section('konten')
    <!-- START FORM -->
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Pilih Universitas</label>
                <div class="col-sm-10">
                    <select class="form-control select" name="universitas_id" id="universitas_id">
                        @foreach ($univ as $univItem)
                            <option value="{{ $univItem->id }}"
                                {{ $univItem->id == $mahasiswa->universitas_id ? 'selected' : '' }}>
                                {{ $univItem->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama" value="{{ $mahasiswa->nama }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nim' id="nim" value="{{ $mahasiswa->nim }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='umur' id="umur" value="{{ $mahasiswa->umur }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' id="alamat"
                        value="{{ $mahasiswa->alamat }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_telp" class="col-sm-2 col-form-label">Nomor Telpon</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='no_telp' id="no_telp"
                        value="{{ $mahasiswa->no_telp }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tanggal_lahir' id="tanggal_lahir"
                        value="{{ $mahasiswa->tanggal_lahir }}">
                </div>
                <script>
                    // Menangkap elemen input tanggal_lahir
                    var tanggalLahir = document.getElementById('tanggal_lahir');

                    // Cek apakah nilai awal elemen input sudah terisi
                    if (tanggalLahir.value) {
                        tanggalLahir.style.display = 'block'; // Tampilkan elemen input
                    } else {
                        tanggalLahir.style.display = 'none'; // Sembunyikan elemen input
                    }
                </script>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                            value="Laki-Laki" {{ $mahasiswa->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jenis_kelamin1">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                            value="Perempuan" {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
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
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Update</button>
                </div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
