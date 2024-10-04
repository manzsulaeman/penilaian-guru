<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilai extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan
    protected $table = 'penilai';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'email',
    ];

    // Jika ada relasi, bisa ditambahkan di sini
    // Contoh: Jika Penilai memiliki relasi dengan Penilaian
    // public function penilaian()
    // {
    //     return $this->hasMany(Penilaian::class, 'penilai_id', 'id_penilai');
    // }
}
