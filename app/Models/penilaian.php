<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'penilaian';

    // Primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_penilaian';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'guru_id',
        'kompetensi_pedagogik',
        'kompetensi_profesional',
        'kompetensi_sosial',
        'kompetensi_kepribadian',
        'nilai_total',
        'catatan',
    ];

    // Relasi ke model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
    }
}
public function guru()
{
    return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
}
