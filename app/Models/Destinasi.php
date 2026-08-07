<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;
    protected $table = 'destinasi';

    protected $fillable = [
    'nama', 'deskripsi', 'gambar', 'jam_buka', 'jam_tutup', 'lokasi', 'harga_tiket',
];

// app/Models/Destinasi.php
public function getJamOperasionalAttribute()
{
    if (is_null($this->jam_buka) && is_null($this->jam_tutup)) {
        return 'Buka 24 Jam';
    }

    return \Carbon\Carbon::parse($this->jam_buka)->format('H:i')
        . ' - '
        . \Carbon\Carbon::parse($this->jam_tutup)->format('H:i');
}
public function atraksi()
{
    return $this->hasMany(Atraksi::class);
}

}

