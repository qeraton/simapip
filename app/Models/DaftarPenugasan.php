<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPenugasan extends Model
{
    use HasFactory;

    protected $table = 'daftar_penugasan';

    protected $fillable = [
            'nama_penugasan',
            'deskripsi_penugasan',
            'prioritas',
        ];
}
