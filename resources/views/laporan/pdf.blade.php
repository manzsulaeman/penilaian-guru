<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kinerja</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Kinerja Guru</h2>

    <table>
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
</body>
</html>
