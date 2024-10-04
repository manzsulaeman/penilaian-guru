@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Tambah Penilaian Guru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penilaian.store') }}" method="POST">
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
            <label for="kompetensi_pedagogik" class="form-label">Kompetensi Pedagogik</label>
            <input type="text" class="form-control" id="kompetensi_pedagogik" name="kompetensi_pedagogik" required>
        </div>
        <div class="mb-3">
            <label for="kompetensi_profesional" class="form-label">Kompetensi Profesional</label>
            <input type="text" class="form-control" id="kompetensi_profesional" name="kompetensi_profesional" required>
        </div>
        <div class="mb-3">
            <label for="kompetensi_sosial" class="form-label">Kompetensi Sosial</label>
            <input type="text" class="form-control" id="kompetensi_sosial" name="kompetensi_sosial" required>
        </div>
        <div class="mb-3">
            <label for="kompetensi_kepribadian" class="form-label">Kompetensi Kepribadian</label>
            <input type="text" class="form-control" id="kompetensi_kepribadian" name="kompetensi_kepribadian" required>
        </div>
        <div class="mb-3">
            <label for="nilai_total" class="form-label">Nilai Total</label>
            <input type="number" class="form-control" id="nilai_total" name="nilai_total" min="0" max="100" required>
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
