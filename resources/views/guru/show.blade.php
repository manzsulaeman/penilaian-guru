@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Detail Guru</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $guru->nama_lengkap }}</h5>
            <p class="card-text"><strong>Mata Pelajaran:</strong> {{ $guru->mata_pelajaran }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $guru->email }}</p>
            <p class="card-text"><strong>Telepon:</strong> {{ $guru->telepon }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $guru->alamat }}</p>
        </div>
    </div>
    <a href="{{ route('guru.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar Guru</a>
</div>
@endsection
