<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pangkat extends Model
{
    use HasFactory;

    protected $table = 'ref_pangkat';

    protected $fillable = [
        'kode',
        'nama',
        'golongan_kode',
        'golongan',
        'urutan',
    ];
}
