@extends('layouts.app')

@section('content')
<div class="container mt-4">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>KRS Saya</h3>

    <a href="{{ route('krs.pdf') }}" class="btn btn-danger">
        Export PDF
    </a>
</div>

    <table class="table table-bordered">
        
        <tr class="table-primary">
            <th>Kode MK</th>
            <th>Nama Matakuliah</th>
            <th>Dosen</th>
        </tr>

        @foreach($krs as $k)
        <tr>
            <td>{{ $k->kode_matakuliah }}</td>
            <td>{{ $k->matakuliah->nama_matakuliah ?? '-' }}</td>
            <td>{{ optional(optional($k->matakuliah)->jadwal->first())->dosen->nama ?? '-' }}</td>  
        </tr>
        @endforeach
    </table>

</div>
@endsection