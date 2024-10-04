<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Feedback;

class NotificationController extends Controller
{
    public function index()
    {
        // Ambil notifikasi untuk penilai
        $penilaianBelumSelesai = Penilaian::where('status', 'belum_selesai')->get();
        $feedbackPerluDiikuti = Feedback::where('status', 'dalam_proses')->get();

        return view('notifications.index', compact('penilaianBelumSelesai', 'feedbackPerluDiikuti'));
    }
}
