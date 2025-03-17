<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';

    protected $fillable = ['kode', 'nama_gejala'];
    // Relasi ke Rules
    public function rules()
    {
        return $this->hasMany(Rules::class, 'gejala_id');
    }
    // Tambahkan fungsi boot di sini
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($gejala) {
            if (empty($gejala->kode)) {
                $latestId = self::max('id') + 1; // Ambil ID terbaru
                $gejala->kode = 'G' . str_pad($latestId, 3, '0', STR_PAD_LEFT); // Contoh kode otomatis G001, G002
            }
        });
    }
    
}
