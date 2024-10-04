<?php
  public function guru()
{
    return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
}
?>
