<!DOCTYPE html>
<html>
<head>
    <title>KRS Mahasiswa</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #0d6efd;
            color: white;
            padding: 8px;
        }
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">KRS Mahasiswa</h2>

<table>
    <thead>
        <tr>
            <th>Kode MK</th>
            <th>Matakuliah</th>
            <th>Dosen</th>
        </tr>
    </thead>
    <tbody>
        @foreach($krs as $k)
        <tr>
            <td>{{ $k->kode_matakuliah }}</td>
            <td>{{ $k->matakuliah->nama_matakuliah ?? '-' }}</td>
            <td>
                {{ optional(optional(optional($k->matakuliah)->jadwal->first())->dosen)->nama ?? '-' }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>