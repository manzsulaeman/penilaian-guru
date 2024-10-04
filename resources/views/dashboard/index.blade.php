@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Summary Cards -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Guru</h5>
                    <p class="card-text">{{ $jumlahGuru }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Penilaian</h5>
                    <p class="card-text">{{ $totalPenilaian }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Kinerja Rata-rata</h5>
                    <p class="card-text">{{ number_format($rataKinerja, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Attendance Chart -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Grafik Kehadiran</h4>
                </div>
                <div class="card-body">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('penilaian.index') }}" class="btn btn-primary btn-block">Penilaian</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('laporan.index') }}" class="btn btn-success btn-block">Laporan</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('feedback.index') }}" class="btn btn-warning btn-block">Feedback</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('attendanceChart').getContext('2d');
    const attendanceChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($grafikKehadiran->pluck('tanggal')) !!},
            datasets: [{
                label: 'Total Kehadiran',
                data: {!! json_encode($grafikKehadiran->pluck('total')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
