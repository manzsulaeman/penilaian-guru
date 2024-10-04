@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kontak Dukungan</h2>

    <form method="POST" action="{{ route('help.contact.submit') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Anda</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Anda</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Pesan</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
@endsection
