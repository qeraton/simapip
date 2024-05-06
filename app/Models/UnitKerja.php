<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerja';

    protected $fillable = [
            'kode_unit_kerja',
            'nama_unit',
            'nama_singkatan',
            'alamat',
            'pimpinan',
            'nomor_telepon',
            'email',
            'website',
            'nomor_urut',
        ];
}
