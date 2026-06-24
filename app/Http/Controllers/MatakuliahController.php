<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|max:8',
            'nama_matakuliah' => 'required|max:50',
            'sks' => 'required|numeric'
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil ditambah');
    }

    public function edit($kode_matakuliah)
    {
        $matakuliah = Matakuliah::findOrFail($kode_matakuliah);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, $kode_matakuliah)
    {
        $matakuliah = Matakuliah::findOrFail($kode_matakuliah);

        $request->validate([
            'kode_matakuliah' => 'required|max:8',
            'nama_matakuliah' => 'required|max:50',
            'sks' => 'required|numeric'
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($kode_matakuliah)
    {
        Matakuliah::destroy($kode_matakuliah);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil dihapus');
    }
}