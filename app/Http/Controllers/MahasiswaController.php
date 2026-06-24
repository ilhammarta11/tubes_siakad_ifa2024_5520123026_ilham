<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required',
            'nidn' => 'required',
            'nama' => 'required'
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success','Data berhasil ditambah');
    }

    public function edit($npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $npm)
{
    $request->validate([
        'npm' => 'required',
        'nidn' => 'required',
        'nama' => 'required'
    ]);

    $mahasiswa = Mahasiswa::findOrFail($npm);

    // update manual (termasuk primary key)
    $mahasiswa->npm = $request->npm;
    $mahasiswa->nidn = $request->nidn;
    $mahasiswa->nama = $request->nama;

    $mahasiswa->save();

    return redirect()->route('mahasiswa.index')->with('success','Data berhasil diupdate');
}

    public function destroy($npm)
    {
        Mahasiswa::destroy($npm);
        return redirect()->route('mahasiswa.index')->with('success','Data berhasil dihapus');
    }
}
