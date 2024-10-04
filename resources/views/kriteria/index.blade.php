@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Kriteria Penilaian</h2>
    <a href="{{ route('kriteria.create') }}" class="btn btn-primary mb-3">Tambah Kriteria</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kriteria</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria as $k)
            <tr>
                <td>{{ $k->nama_kriteria }}</td>
                <td>{{ $k->deskripsi }}</td>
                <td>{{ $k->kategori }}</td>
                <td>
                    <a href="{{ route('kriteria.edit', $k->id_kriteria) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
