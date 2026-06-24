@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Jadwal Kuliah</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Kode MK</th>
            <th>Matakuliah</th>
            <th>Dosen</th>
            <th>Kelas</th>
            <th>Hari</th>
            <th>Jam</th>
        </tr>

        @foreach($jadwal as $j)
        <tr>
            <td>{{ $j->kode_matakuliah }}</td>
            <td>{{ $j->matakuliah->nama_matakuliah ?? '-' }}</td>
            <td>{{ $j->dosen->nama ?? '-' }}</td>
            <td>{{ $j->kelas }}</td>
            <td>{{ $j->hari }}</td>
            <td>{{ $j->jam }}</td>
        </tr>
        @endforeach

    </table>

</div>
@endsection