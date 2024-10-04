<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'parameter',
        'value',
    ];

    // Jika Anda ingin menambahkan tipe data untuk parameter
    protected $casts = [
        'value' => 'json', // Misalnya untuk menyimpan beberapa pengaturan dalam format JSON
    ];
}
