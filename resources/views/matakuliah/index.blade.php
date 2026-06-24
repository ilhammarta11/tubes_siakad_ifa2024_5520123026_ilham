@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Matakuliah</h4>

        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">
            + Tambah Matakuliah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Kode</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Aksi</th>
        </tr>

        @foreach($matakuliah as $m)
        <tr>
            <td>{{ $m->kode_matakuliah }}</td>
            <td>{{ $m->nama_matakuliah }}</td>
            <td>{{ $m->sks }}</td>
            <td>
                <a href="{{ route('matakuliah.edit', $m->kode_matakuliah) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('matakuliah.destroy', $m->kode_matakuliah) }}"
                      method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>
@endsection