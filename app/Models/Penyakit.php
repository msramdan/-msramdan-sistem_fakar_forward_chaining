<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'tb_penyakit';

    protected $fillable = [
        'kd_penyakit',
        'penyakit',
        'keterangan',
        'solusi',
    ];
}
