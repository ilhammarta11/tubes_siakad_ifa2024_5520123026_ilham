@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h5>Tambah Jadwal</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Matakuliah</label>
                    <select name="kode_matakuliah" class="form-control">
                        @foreach($matakuliah as $m)
                            <option value="{{ $m->kode_matakuliah }}">
                                {{ $m->nama_matakuliah }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Dosen</label>
                    <select name="nidn" class="form-control">
                        @foreach($dosen as $d)
                            <option value="{{ $d->nidn }}">
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Hari</label>
                    <input type="text" name="hari" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jam</label>
                    <input type="time" name="jam" class="form-control">
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection