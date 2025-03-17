<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    // Pastikan model ini terhubung dengan tabel `gejala`
    protected $table = 'gejala';

    // Properti `fillable` menentukan kolom mana yang dapat diisi secara massal
    protected $fillable = [
        'nama_gejala',
    ];
}
