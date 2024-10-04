<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'feedback';

    // Primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id_feedback';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'guru_id',
        'konten_feedback',
        'rencana_tindak_lanjut',
        'status',
    ];

    // Relasi ke model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
    }
}
