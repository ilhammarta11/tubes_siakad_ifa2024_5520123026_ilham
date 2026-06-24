@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h5>Tambah Dosen</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('dosen.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>NIDN</label>
                    <input type="text" name="nidn" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nama Dosen</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('dosen.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>
@endsection