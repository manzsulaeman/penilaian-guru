<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianGuru extends Model
{
    /**
     * Relasi ke model Guru.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
    }
}
