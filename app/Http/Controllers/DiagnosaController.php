<?php
namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rules;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    /**
     * Menampilkan halaman diagnosa dengan daftar gejala.
     */
    public function index()
    {
        $gejala = Gejala::all();
        return view('diagnosa.gejala', compact('gejala'));
    }

    /**
     * Proses diagnosa berdasarkan gejala yang dipilih pengguna.
     */
    public function store(Request $request)
    {
        // Validasi input gejala
        $validated = $request->validate([
            'gejala' => 'required|array',
            'gejala.*' => 'exists:gejala,id',
        ]);

        $gejalaDipilih = $validated['gejala'];

        // Cari aturan yang sesuai
        $rules = Rules::whereHas('gejala', function ($query) use ($gejalaDipilih) {
            $query->whereIn('gejala.id', $gejalaDipilih);
        })->get();

        $penyakitTerdiagnosis = [];

        // Hitung CF untuk setiap penyakit
        foreach ($rules->groupBy('penyakit_id') as $penyakitId => $ruleGroup) {
            $cf = 0;

            foreach ($ruleGroup as $rule) {
                $cfGejala = $rule->nilai_cf;
                $cf = $cf == 0 ? $cfGejala : $cf + $cfGejala * (1 - $cf);
            }

            if ($cf >= 0.5) {
                $penyakit = Penyakit::find($penyakitId);
                $penyakitTerdiagnosis[] = [
                    'penyakit' => $penyakit->nama_penyakit,
                    'deskripsi' => $penyakit->deskripsi,
                    'solusi' => $penyakit->solusi,
                    'cf' => $cf * 100,
                ];
            }
        }

        // Tampilkan hasil diagnosa
        return view('diagnosa.hasil-diagnosa', compact('penyakitTerdiagnosis'));
    }

    public function hasil(Request $request)
{
    // Ambil data hasil diagnosa yang dikirimkan melalui redirect
    $penyakitTerdiagnosis = $request->get('penyakitTerdiagnosis', []);
    
    // Tampilkan hasil diagnosa
    return view('diagnosa.hasil-diagnosa', compact('penyakitTerdiagnosis'));
}
    }
