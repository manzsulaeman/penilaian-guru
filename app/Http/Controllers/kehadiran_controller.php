<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use App\Models\Guru;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadiran = Kehadiran::with('guru')->get();
        return view('kehadiran.index', compact('kehadiran'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('kehadiran.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'guru_id' => 'required|exists:gurus,id_guru',
            'tanggal_kehadiran' => 'required|date',
            'status' => 'required|in:hadir,izin,sakit,alpa',
            'keterangan' => 'nullable|string',
        ]);

        Kehadiran::create($validatedData);

        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil ditambahkan.');
    }
}
