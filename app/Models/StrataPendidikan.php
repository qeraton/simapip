<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrataPendidikan extends Model
{
    use HasFactory;

    protected $table = 'ref_strata_pendidikan';

    protected $fillable = [
            'nama',
            'sort_level'
        ];
}
