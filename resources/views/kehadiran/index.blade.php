@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Riwayat Kehadiran Guru</h2>
    <a href="{{ route('kehadiran.create') }}" class="btn btn-primary mb-3">Input Kehadiran</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Guru</th>
                <th>Tanggal Kehadiran</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kehadiran as $k)
            <tr>
                <td>{{ $k->guru->nama }}</td>
                <td>{{ $k->tanggal_kehadiran->format('d-m-Y') }}</td>
                <td>{{ ucfirst($k->status) }}</td>
                <td>{{ $k->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
