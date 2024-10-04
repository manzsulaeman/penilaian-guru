@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bantuan dan Dokumentasi</h2>

    <h4>FAQ</h4>
    <ul class="list-group mb-4">
        <li class="list-group-item">
            <strong>Q: Apa itu sistem penilaian kinerja guru?</strong>
            <p>A: Sistem ini digunakan untuk menilai kinerja guru berdasarkan beberapa kriteria yang telah ditentukan.</p>
        </li>
        <li class="list-group-item">
            <strong>Q: Bagaimana cara mengakses laporan kinerja?</strong>
            <p>A: Anda dapat mengakses laporan kinerja melalui menu Laporan Kinerja di dashboard.</p>
        </li>
        <li class="list-group-item">
            <strong>Q: Bagaimana cara menghubungi dukungan?</strong>
            <p>A: Anda dapat menghubungi dukungan melalui halaman Kontak Dukungan.</p>
        </li>
        <!-- Tambahkan lebih banyak FAQ sesuai kebutuhan -->
    </ul>

    <h4>Panduan</h4>
    <p>Untuk panduan lengkap tentang cara menggunakan sistem ini, silakan baca dokumentasi yang tersedia di <a href="#">tautan ini</a>.</p>

    <a href="{{ route('help.contact') }}" class="btn btn-primary">Kontak Dukungan</a>
</div>
@endsection
