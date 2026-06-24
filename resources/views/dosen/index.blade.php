@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Dosend</h4>
        <a href="{{ route('dosen.create') }}" class="btn btn-primary">
            + Tambah Dosen
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>

        @foreach($dosen as $d)
        <tr>
            <td>{{ $d->nidn }}</td>
            <td>{{ $d->nama }}</td>
            <td>
                <a href="{{ route('dosen.edit', $d->nidn) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('dosen.destroy', $d->nidn) }}" method="POST" style="display:inline;">
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