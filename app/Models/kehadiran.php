<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'kehadiran';

    // Primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_kehadiran';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'guru_id',
        'tanggal_kehadiran',
        'status',
        'keterangan',
    ];

    // Relasi ke model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
    }

    // Cast tanggal_kehadiran ke tipe date
    protected $casts = [
        'tanggal_kehadiran' => 'date',
    ];
}
