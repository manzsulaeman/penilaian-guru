<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Guru;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::with('guru')->get();
        return view('feedback.index', compact('feedback'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('feedback.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'guru_id' => 'required|exists:gurus,id_guru',
            'konten_feedback' => 'required|string',
            'rencana_tindak_lanjut' => 'required|string',
            'status' => 'required|in:diterima,dalam proses,selesai',
        ]);

        Feedback::create($validatedData);

        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil ditambahkan.');
    }

    public function show($id)
    {
        $feedback = Feedback::with('guru')->findOrFail($id);
        return view('feedback.show', compact('feedback'));
    }
}
