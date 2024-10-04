<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Guru;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaian = Penilaian::with('guru')->get();
        return view('penilaian.index', compact('penilaian'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('penilaian.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'guru_id' => 'required|exists:gurus,id_guru',
            'kompetensi_pedagogik' => 'required|string',
            'kompetensi_profesional' => 'required|string',
            'kompetensi_sosial' => 'required|string',
            'kompetensi_kepribadian' => 'required|string',
            'nilai_total' => 'required|integer|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);

        Penilaian::create($validatedData);

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil ditambahkan.');
    }

    public function show($id)
    {
        $penilaian = Penilaian::with('guru')->findOrFail($id);
        return view('penilaian.show', compact('penilaian'));
    }
}
