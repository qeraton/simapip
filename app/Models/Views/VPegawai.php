<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;
use EvoMark\LaravelIdObfuscator\Traits\Obfuscatable;

class VPegawai extends Model
{
    use Obfuscatable;

    protected $table = 'pegawai';

}
