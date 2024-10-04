@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Penilai</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('penilai.create') }}" class="btn btn-primary mb-3">Tambah Penilai</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penilai as $p)
            <tr>
                <td>{{ $p->id_penilai }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    <a href="{{ route('penilai.edit', $p->id_penilai) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penilai.destroy', $p->id_penilai) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
