@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Laporan Kinerja Guru</h2>

    <h4>Guru: {{ $penilaians->first()->guru->nama }}</h4>
    <h4>Periode: {{ $request->start_date }} s/d {{ $request->end_date }}</h4>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Tanggal Penilaian</th>
                <th>Aspek Penilaian</th>
                <th>Nilai</th>
                <th>Ulasan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penilaians as $penilaian)
            <tr>
                <td>{{ $penilaian->created_at->format('d-m-Y') }}</td>
                <td>{{ $penilaian->aspek_penilaian }}</td>
                <td>{{ $penilaian->nilai }}</td>
                <td>{{ $penilaian->ulasan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        <a href="{{ route('laporan.download.pdf', ['guru_id' => $request->guru_id, 'start_date' => $request->start_date, 'end_date' => $request->end_date]) }}" class="btn btn-danger">Unduh PDF</a>
        <a href="{{ route('laporan.download.excel', ['guru_id' => $request->guru_id, 'start_date' => $request->start_date, 'end_date' => $request->end_date]) }}" class="btn btn-success">Unduh Excel</a>
    </div>
</div>
@endsection
