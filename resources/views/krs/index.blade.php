@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data KRS</h4>

        <a href="{{ route('krs.create') }}" class="btn btn-primary">
            + Tambah KRS
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>NPM</th>
            <th>Mahasiswa</th>
            <th>Matakuliah</th>
            <th>Aksi</th>
        </tr>

        @foreach($krs as $k)
        <tr>
            <td>{{ $k->npm }}</td>
            <td>{{ $k->mahasiswa->nama ?? '-' }}</td>
            <td>{{ $k->matakuliah->nama_matakuliah ?? '-' }}</td>
            <td>
                <a href="{{ route('krs.edit', $k->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('krs.destroy', $k->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>
@endsection