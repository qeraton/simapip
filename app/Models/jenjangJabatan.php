<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenjangJabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_jabatan_id',
        'kode',
        'nama',
        'level',
    ];
    protected $table = 'ref_jenjang_jabatan';

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'ref_jabatan');
    }
}
