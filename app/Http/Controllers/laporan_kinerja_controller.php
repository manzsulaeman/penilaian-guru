<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Penilaian;
use PDF; // Untuk export ke PDF
use Maatwebsite\Excel\Facades\Excel; // Untuk export ke Excel
use App\Exports\LaporanKinerjaExport; // Kelas ekspor untuk Excel

class LaporanKinerjaController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('laporan.index', compact('gurus'));
    }

    public function show(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id_guru',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $penilaians = Penilaian::where('guru_id', $request->guru_id)
            ->whereBetween('created_at', [$request->start_date, $request->end_date])
            ->with('guru') // Hubungkan dengan model Guru
            ->get();

        return view('laporan.show', compact('penilaians', 'request'));
    }

    public function downloadPDF(Request $request)
    {
        $penilaians = Penilaian::where('guru_id', $request->guru_id)
            ->whereBetween('created_at', [$request->start_date, $request->end_date])
            ->get();

        $pdf = PDF::loadView('laporan.pdf', compact('penilaians'));
        return $pdf->download('laporan_kinerja.pdf');
    }

    public function downloadExcel(Request $request)
    {
        return Excel::download(new LaporanKinerjaExport($request->guru_id, $request->start_date, $request->end_date), 'laporan_kinerja.xlsx');
    }
}
