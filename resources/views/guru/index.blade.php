@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Guru</h2>
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Mata Pelajaran</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guru as $g)
            <tr>
                <td>{{ $g->nama_lengkap }}</td>
                <td>{{ $g->mata_pelajaran }}</td>
                <td>{{ $g->email }}</td>
                <td>{{ $g->telepon }}</td>
                <td>
                    <a href="{{ route('guru.show', $g->id_guru) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('guru.edit', $g->id_guru) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
