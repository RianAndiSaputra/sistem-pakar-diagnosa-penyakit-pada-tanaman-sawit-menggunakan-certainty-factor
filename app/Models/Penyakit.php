<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dengan konvensi
    protected $table = 'penyakit';

    // Tentukan kolom yang bisa diisi (fillable)
    protected $fillable = ['kode', 'nama_penyakit', 'deskripsi', 'solusi', 'gejala'];

    // Tentukan primary key jika berbeda
    protected $primaryKey = 'id';

    // Relasi dengan model Rule
    public function rules()
    {
        return $this->hasMany(Rule::class, 'penyakit_id', 'id');
    }
}
