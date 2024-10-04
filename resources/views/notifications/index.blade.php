@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Notifikasi</h2>

    <div class="alert alert-info" role="alert">
        Berikut adalah notifikasi yang perlu diperhatikan:
    </div>

    <h4>Penilaian yang Belum Selesai</h4>
    @if($penilaianBelumSelesai->isEmpty())
        <p>Tidak ada penilaian yang belum selesai.</p>
    @else
        <ul class="list-group mb-4">
            @foreach($penilaianBelumSelesai as $penilaian)
                <li class="list-group-item">
                    Penilaian untuk Guru: <strong>{{ $penilaian->guru->nama }}</strong><br>
                    Tanggal: {{ $penilaian->created_at->format('d M Y') }}<br>
                    Status: <span class="badge bg-warning">{{ $penilaian->status }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    <h4>Feedback yang Perlu Diikuti</h4>
    @if($feedbackPerluDiikuti->isEmpty())
        <p>Tidak ada feedback yang perlu diikuti.</p>
    @else
        <ul class="list-group">
            @foreach($feedbackPerluDiikuti as $feedback)
                <li class="list-group-item">
                    Feedback untuk Guru: <strong>{{ $feedback->guru->nama }}</strong><br>
                    Tanggal: {{ $feedback->created_at->format('d M Y') }}<br>
                    Status: <span class="badge bg-warning">{{ $feedback->status }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
