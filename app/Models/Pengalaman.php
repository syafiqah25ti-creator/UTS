<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'pengalaman';

    protected $fillable = [
        'biodata_id',
        'posisi',
        'perusahaan',
        'tahun_mulai',
        'tahun_selesai',
        'deskripsi',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata1192::class, 'biodata_id');
    }
}
