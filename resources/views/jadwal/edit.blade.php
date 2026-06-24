@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h5>Edit Jadwal</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Matakuliah</label>
                    <select name="kode_matakuliah" class="form-control">
                        @foreach($matakuliah as $m)
                            <option value="{{ $m->kode_matakuliah }}"
                                {{ $jadwal->kode_matakuliah == $m->kode_matakuliah ? 'selected' : '' }}>
                                {{ $m->nama_matakuliah }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Dosen</label>
                    <select name="nidn" class="form-control">
                        @foreach($dosen as $d)
                            <option value="{{ $d->nidn }}"
                                {{ $jadwal->nidn == $d->nidn ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Kelas</label>
                    <input type="text" name="kelas"
                           value="{{ $jadwal->kelas }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Hari</label>
                    <input type="text" name="hari"
                           value="{{ $jadwal->hari }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jam</label>
                    <input type="time" name="jam"
                           value="{{ $jadwal->jam }}"
                           class="form-control">
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection