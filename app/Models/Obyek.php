<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'no_telp',
        'email',
        'website',
        'pimpinan',
    ];
    protected $table = 'ref_obyek';
}
