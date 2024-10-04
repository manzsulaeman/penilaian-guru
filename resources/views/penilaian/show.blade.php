@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Detail Penilaian Guru</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Guru: {{ $penilaian->guru->nama }}</h5>
            <p class="card-text"><strong>Kompetensi Pedagogik:</strong> {{ $penilaian->kompetensi_pedagogik }}</p>
            <p class="card-text"><strong>Kompetensi Profesional:</strong> {{ $penilaian->kompetensi_profesional }}</p>
            <p class="card-text"><strong>Kompetensi Sosial:</strong> {{ $penilaian->kompetensi_sosial }}</p>
            <p class="card-text"><strong>Kompetensi Kepribadian:</strong> {{ $penilaian->kompetensi_kepribadian }}</p>
            <p class="card-text"><strong>Nilai Total:</strong> {{ $penilaian->nilai_total }}</p>
            <p class="card-text"><strong>Catatan:</strong> {{ $penilaian->catatan }}</p>
        </div>
    </div>
</div>
@endsection
