@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h5>Data Jadwal</h5>

        <a href="{{ route('jadwal.create') }}" class="btn btn-primary">
            + Tambah Jadwal
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Matakuliah</th>
            <th>Dosen</th>
            <th>Kelas</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Aksi</th>
        </tr>

        @foreach($jadwal as $j)
        <tr>
            <td>{{ $j->matakuliah->nama_matakuliah }}</td>
            <td>{{ $j->dosen->nama }}</td>
            <td>{{ $j->kelas }}</td>
            <td>{{ $j->hari }}</td>
            <td>{{ $j->jam }}</td>
            <td>
                <a href="{{ route('jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('jadwal.destroy', $j->id) }}"
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