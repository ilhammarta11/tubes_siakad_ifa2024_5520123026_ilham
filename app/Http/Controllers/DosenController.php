<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required',
            'nama' => 'required'
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosen.index')->with('success','Data berhasil ditambah');
    }

    public function edit($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $nidn)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn,'.$nidn.',nidn',
            'nama' => 'required'
        ]);

        $dosen = Dosen::findOrFail($nidn);

        // supaya nidn bisa diubah
        $dosen->nidn = $request->nidn;
        $dosen->nama = $request->nama;
        $dosen->save();

        return redirect()->route('dosen.index')->with('success','Data berhasil diupdate');
    }

    public function destroy($nidn)
    {
        Dosen::destroy($nidn);
        return redirect()->route('dosen.index')->with('success','Data berhasil dihapus');
    }
}