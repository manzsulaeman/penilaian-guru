@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Detail Feedback</h2>

    <div class="mb-3">
        <strong>Guru:</strong> {{ $feedback->guru->nama }}
    </div>
    <div class="mb-3">
        <strong>Konten Feedback:</strong>
        <p>{{ $feedback->konten_feedback }}</p>
    </div>
    <div class="mb-3">
        <strong>Rencana Tindak Lanjut:</strong>
        <p>{{ $feedback->rencana_tindak_lanjut }}</p>
    </div>
    <div class="mb-3">
        <strong>Status:</strong> {{ ucfirst($feedback->status) }}
    </div>
    <a href="{{ route('feedback.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
