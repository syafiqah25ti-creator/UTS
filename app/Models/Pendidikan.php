<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';

    protected $fillable = [
        'biodata_id',
        'nama_institusi',
        'jenjang',
        'jurusan',
        'tahun_masuk',
        'tahun_lulus',
        'deskripsi',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata1192::class, 'biodata_id');
    }
}
