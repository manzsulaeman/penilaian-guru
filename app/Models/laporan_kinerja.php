<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKinerja extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan
    protected $table = 'laporan_kinerja';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'guru_id',
        'tanggal',
        'kriteria',
        'nilai',
        'ulasan',
    ];

    // Definisikan relasi dengan model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
    }

    // Definisikan relasi dengan model Penilaian jika diperlukan
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'guru_id', 'guru_id');
    }
}
