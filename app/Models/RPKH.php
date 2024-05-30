<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPKH extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'kartu_penugasan',
        'hari',
        'tanggal_pelaksanaan_kegiatan',
        'rencana_kegiatan',
        'tim',
        'realisasi_kegiatan',
        'keterangan',
        // 'start_date',
        // 'end_date',
    ];

    protected $table = 'perencanaan_rpkh';
}
