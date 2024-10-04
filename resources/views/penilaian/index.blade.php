@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Penilaian Guru</h2>
    <a href="{{ route('penilaian.create') }}" class="btn btn-primary mb-3">Tambah Penilaian</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Guru</th>
                <th>Tanggal Penilaian</th>
                <th>Nilai Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penilaian as $p)
            <tr>
                <td>{{ $p->guru->nama }}</td>
                <td>{{ $p->created_at->format('d-m-Y') }}</td>
                <td>{{ $p->nilai_total }}</td>
                <td>
                    <a href="{{ route('penilaian.show', $p->id_penilaian) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
