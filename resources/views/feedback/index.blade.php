@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Laporan Kinerja Guru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('laporan.show') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="guru_id" class="form-label">Guru</label>
            <select class="form-select" id="guru_id" name="guru_id" required>
                <option value="" selected disabled>Pilih Guru</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id_guru }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Akhir</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Lihat Laporan</button>
    </form>
</div>
@endsection
