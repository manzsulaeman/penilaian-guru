<?php

namespace App\Exports;

use App\Models\Penilaian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanKinerjaExport implements FromCollection, WithHeadings
{
    protected $guru_id;
    protected $start_date;
    protected $end_date;

    public function __construct($guru_id, $start_date, $end_date)
    {
        $this->guru_id = $guru_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        return Penilaian::where('guru_id', $this->guru_id)
            ->whereBetween('created_at', [$this->start_date, $this->end_date])
            ->get(['created_at', 'aspek_penilaian', 'nilai', 'ulasan']);
    }

    public function headings(): array
    {
        return [
            'Tanggal Penilaian',
            'Aspek Penilaian',
            'Nilai',
            'Ulasan',
        ];
    }
}
