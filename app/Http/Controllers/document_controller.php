<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::all();
        return view('dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_dokumen' => 'required|string|max:100',
            'file' => 'required|file|mimes:pdf,doc,docx,xlsx',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $path = $request->file('file')->store('dokumen');

        Dokumen::create([
            'nama_dokumen' => $validatedData['nama_dokumen'],
            'path' => $path,
            'keterangan' => $validatedData['keterangan'] ?? null,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diunggah.');
    }

    public function download($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        return Storage::download($dokumen->path, $dokumen->nama_dokumen);
    }
}
