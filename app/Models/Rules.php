<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    use HasFactory;

    protected $fillable = ['nama_aturan', 'penyakit_id', 'gejala_id', 'nilai_cf']; // Added 'gejala_id'

    protected $table = 'rules'; // Tabel yang menghubungkan gejala dan penyakit

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id');
    }
}
