@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Input Kehadiran Guru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kehadiran.store') }}" method="POST">
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
            <label for="tanggal_kehadiran" class="form-label">Tanggal Kehadiran</label>
            <input type="date" class="form-control" id="tanggal_kehadiran" name="tanggal_kehadiran" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status Kehadiran</label>
            <select class="form-select" id="status" name="status" required>
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
                <option value="alpa">Alpa</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
