<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        return view('help.index');
    }

    public function contact()
    {
        return view('help.contact');
    }
}
public function submitContact(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // Di sini Anda bisa menambahkan logika untuk menyimpan pesan ke database,
    // mengirim email, atau yang lainnya sesuai kebutuhan.

    return redirect()->route('help.index')->with('success', 'Pesan Anda telah dikirim!');
}
