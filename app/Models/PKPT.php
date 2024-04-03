<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKPT extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'jenis',
        'unit',
        'tujuan_audit',
        'ruang_lingkup',
        'susunan_tim',
        'waktu_dk',
        'waktu_lk',
        'waktu_hp',
        'biaya_dk',
        'biaya_lk',
        'total',
        'rmp',
        'rpl',
        'lha',
        'peralatan',
        'keterangan',
    ];

    protected $table = 'perencanaan_pkpt';
}
