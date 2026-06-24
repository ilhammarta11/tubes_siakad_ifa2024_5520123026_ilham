@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Mahasiswa</h4>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
            + Tambah Mahasiswa
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">

            <table class="table table-bordered mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>NPM</th>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs->npm }}</td>
                        <td>{{ $mhs->nidn }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>
                            <a href="{{ route('mahasiswa.edit', $mhs->npm) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('mahasiswa.destroy', $mhs->npm) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($mahasiswa->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada data
                        </td>
                    </tr>
                    @endif
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection