@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Dokumen Pendukung</h2>
    <a href="{{ route('dokumen.create') }}" class="btn btn-primary mb-3">Unggah Dokumen</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Dokumen</th>
                <th>Keterangan</th>
                <th>Tanggal Upload</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokumen as $d)
            <tr>
                <td>{{ $d->nama_dokumen }}</td>
                <td>{{ $d->keterangan }}</td>
                <td>{{ $d->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('dokumen.download', $d->id_dokumen) }}" class="btn btn-success btn-sm">Unduh</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
