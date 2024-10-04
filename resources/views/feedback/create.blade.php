@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Beri Feedback untuk Guru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('feedback.store') }}" method="POST">
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
            <label for="konten_feedback" class="form-label">Konten Feedback</label>
            <textarea class="form-control" id="konten_feedback" name="konten_feedback" required></textarea>
        </div>
        <div class="mb-3">
            <label for="rencana_tindak_lanjut" class="form-label">Rencana Tindak Lanjut</label>
            <textarea class="form-control" id="rencana_tindak_lanjut" name="rencana_tindak_lanjut" required></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="diterima">Diterima</option>
                <option value="dalam proses">Dalam Proses</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
