<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata1192 extends Model
{
    protected $table = 'Biodata_1192';

    protected $fillable = [
        'nama_lengkap',
        'profesi',
        'email',
        'telepon',
        'alamat',
        'ringkasan',
        'foto',
    ];

    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class, 'biodata_id');
    }

    public function pengalamans()
    {
        return $this->hasMany(Pengalaman::class, 'biodata_id');
    }
}
