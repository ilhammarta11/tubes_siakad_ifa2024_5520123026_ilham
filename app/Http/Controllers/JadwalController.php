<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
    if (auth()->user()->role !== 'admin') {
        return redirect()->route('jadwal.view');
    }

    $jadwal = Jadwal::with(['matakuliah','dosen'])->get();
    return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();
        return view('jadwal.create', compact('matakuliah','dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required',
            'nidn' => 'required',
            'kelas' => 'required|max:10',
            'hari' => 'required',
            'jam' => 'required'
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')
            ->with('success','Data berhasil ditambah');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();

        return view('jadwal.edit', compact('jadwal','matakuliah','dosen'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'kode_matakuliah' => 'required',
            'nidn' => 'required',
            'kelas' => 'required|max:1',
            'hari' => 'required',
            'jam' => 'required'
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')
            ->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Jadwal::destroy($id);

        return redirect()->route('jadwal.index')
            ->with('success','Data berhasil dihapus');
    }
    public function view()
    {
    $jadwal = Jadwal::with(['matakuliah', 'dosen'])->get();

    return view('jadwal.view', compact('jadwal'));
    }
}