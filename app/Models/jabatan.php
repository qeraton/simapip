<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;

    protected $table = 'ref_jabatan';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'kelompok_jabatan'
    ];
}
