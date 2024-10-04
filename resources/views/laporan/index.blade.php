@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Riwayat Feedback Guru</h2>
    <a href="{{ route('feedback.create') }}" class="btn btn-primary mb-3">Beri Feedback</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Guru</th>
                <th>Konten Feedback</th>
                <th>Rencana Tindak Lanjut</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedback as $f)
            <tr>
                <td>{{ $f->guru->nama }}</td>
                <td>{{ $f->konten_feedback }}</td>
                <td>{{ $f->rencana_tindak_lanjut }}</td>
                <td>{{ ucfirst($f->status) }}</td>
                <td>
                    <a href="{{ route('feedback.show', $f->id_feedback) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
