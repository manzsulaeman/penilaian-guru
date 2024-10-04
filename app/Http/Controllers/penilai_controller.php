<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilai;

class PenilaiController extends Controller
{
    public function index()
    {
        $penilai = Penilai::all();
        return view('penilai.index', compact('penilai'));
    }

    public function create()
    {
        return view('penilai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penilai,email',
        ]);

        Penilai::create($request->all());
        return redirect()->route('penilai.index')->with('success', 'Penilai berhasil ditambahkan.');
    }

    public function edit(Penilai $penilai)
    {
        return view('penilai.edit', compact('penilai'));
    }

    public function update(Request $request, Penilai $penilai)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penilai,email,' . $penilai->id_penilai,
        ]);

        $penilai->update($request->all());
        return redirect()->route('penilai.index')->with('success', 'Penilai berhasil diperbarui.');
    }

    public function destroy(Penilai $penilai)
    {
        $penilai->delete();
        return redirect()->route('penilai.index')->with('success', 'Penilai berhasil dihapus.');
    }
}
