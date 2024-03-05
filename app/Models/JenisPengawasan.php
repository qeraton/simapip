<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengawasan extends Model
{
    use HasFactory;

    protected $table = 'ref_jenis_pengawasan';

protected $fillable = [
        'kode',
        'nama',
    ];
}
