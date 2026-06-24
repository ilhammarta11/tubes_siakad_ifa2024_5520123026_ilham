@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h5>Edit Matakuliah</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('matakuliah.update', $matakuliah->kode_matakuliah) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode Matakuliah</label>
                    <input type="text" name="kode_matakuliah"
                           class="form-control"
                           value="{{ $matakuliah->kode_matakuliah }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Matakuliah</label>
                    <input type="text" name="nama_matakuliah"
                           class="form-control"
                           value="{{ $matakuliah->nama_matakuliah }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">SKS</label>
                    <input type="number" name="sks"
                           class="form-control"
                           value="{{ $matakuliah->sks }}">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>
@endsection