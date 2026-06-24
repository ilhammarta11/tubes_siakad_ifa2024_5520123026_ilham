@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h5>Tambah KRS</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('krs.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Mahasiswa</label>
                    <select name="npm" class="form-control" required>
                        @foreach($mahasiswa as $m)
                            <option value="{{ $m->npm }}">{{ $m->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Mata Kuliah</label>
                    <select name="kode_matakuliah" class="form-control" required>
                        @foreach($matakuliah as $mk)
                            <option value="{{ $mk->kode_matakuliah }}">{{ $mk->nama_matakuliah }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('krs.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>
@endsection