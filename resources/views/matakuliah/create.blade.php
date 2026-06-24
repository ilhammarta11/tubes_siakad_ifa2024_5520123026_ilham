@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h5>Tambah Matakuliah</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('matakuliah.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Matakuliah</label>
                    <input type="text" name="kode_matakuliah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Matakuliah</label>
                    <input type="text" name="nama_matakuliah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">SKS</label>
                    <input type="number" name="sks" class="form-control" required>
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