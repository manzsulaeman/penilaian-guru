<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\PenilaianGuru;
use App\Models\KehadiranGuru;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah total guru yang ada
        $jumlahGuru = Guru::count();

        // Menghitung total penilaian yang telah dilakukan
        $totalPenilaian = PenilaianGuru::count();

        // Menghitung rata-rata kinerja guru (nilai kriteria 1 sebagai contoh)
        $rataKinerja = PenilaianGuru::avg('nilai_kriteria_1');

        // Mengambil data kehadiran untuk grafik, di mana data dikelompokkan berdasarkan tanggal
        $grafikKehadiran = KehadiranGuru::selectRaw('DATE(tanggal) as tanggal, COUNT(*) as total')
                                        ->groupBy('tanggal')
                                        ->get();

        // Mengirimkan data ke halaman dashboard
        return view('dashboard.index', compact('jumlahGuru', 'totalPenilaian', 'rataKinerja', 'grafikKehadiran'));
    }
}
