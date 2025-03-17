<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Models\Rule;
use Illuminate\Http\Request;

class HasilDiagnosaController extends Controller
{
    public function diagnosa(Request $request)
    {
        // Controller: DiagnosaController.php
        

        // Lakukan proses diagnosa dan dapatkan hasil
        $gejalaDipilih = $request->input('gejala'); // Gejala yang dipilih
        $cfUser = $request->input('cf_user'); // Keyakinan user untuk setiap gejala

        // Debugging: Periksa input yang diterima
        \Log::info('Gejala Dipilih: ', $gejalaDipilih);
        \Log::info('CF User: ', $cfUser);

        if (!$gejalaDipilih) {
            return redirect()->back()->with('error', 'Pilih minimal satu gejala.');
        }

        // Inisialisasi hasil diagnosa
        $hasilDiagnosis = [];

        foreach ($gejalaDipilih as $idGejala) {
            $cfUserValue = $cfUser[$idGejala];

            // Ambil semua aturan untuk gejala ini
            // $rules = Rule::where('gejala_id', $idGejala)->get();
            $rules = Rules::with('penyakit')
                ->whereIn('gejala_id', $idGejala)
                ->get();
            

            foreach ($rules as $rule) {
                $idPenyakit = $rule->id_penyakit;
                $cfPakar = $rule->bobot_pakar;

                // Hitung CF
                $cf = $cfPakar * $cfUserValue;

                // Gabungkan CF jika penyakit sama sudah didiagnosa
                if (isset($hasilDiagnosis[$idPenyakit])) {
                    $hasilDiagnosis[$idPenyakit] = $hasilDiagnosis[$idPenyakit] + (1 - $hasilDiagnosis[$idPenyakit]) * $cf;
                } else {
                    $hasilDiagnosis[$idPenyakit] = $cf;
                }
            }
        }

        // Urutkan hasil berdasarkan CF tertinggi
        arsort($hasilDiagnosis);

        // Ambil detail penyakit untuk hasil diagnosa
        $penyakitTerdiagnosis = [];
        foreach ($hasilDiagnosis as $idPenyakit => $cf) 

        $penyakitTerdiagnosis = Diagnosa::with('penyakit')->get();
        {
            // $penyakit = Penyakit::find($idPenyakit);
            // Di controller, ambil data dengan relasi
       


            if ($penyakit) {
                // Pastikan deskripsi dan solusi ada
                // $penyakitTerdiagnosis[] = [
                //     'penyakit' => $penyakit->nama_penyakit,
                //     'cf' => round($cf * 100, 2), // Dalam persen
                    
                //     'deskripsi' => $penyakit->deskripsi ?? 'Deskripsi tidak tersedia', // Menambahkan fallback jika kosong
                //     'solusi' => $penyakit->solusi ?? 'Solusi tidak tersedia', // Menambahkan fallback jika kosong
                // ];

                foreach ($penyakitTerdiagnosis as $key => $hasil) {
                    $penyakit = Penyakit::find($hasil['penyakit']);
                    $penyakitTerdiagnosis[$key]['deskripsi'] = $penyakit->deskripsi;
                    $penyakitTerdiagnosis[$key]['solusi'] = $penyakit->solusi;
                }
            } else {
                \Log::error("Penyakit dengan ID $idPenyakit tidak ditemukan.");
            }
        }

        // Tampilkan hasil diagnosa ke view
        return view('diagnosa.hasil-diagnosa', compact('penyakitTerdiagnosis'));
    }

    public function hasilDiagnosa(Request $request)
    {
        // Lakukan proses diagnosa dan dapatkan hasil
        $gejala = $request->input('gejala');
        $penyakitTerdiagnosis = $this->diagnosa->prosesDiagnosa($gejala);

        // Sertakan deskripsi dan solusi untuk setiap penyakit
        foreach ($penyakitTerdiagnosis as $key => $hasil) {
            $penyakit = Penyakit::find($hasil['penyakit']);
            $penyakitTerdiagnosis[$key]['deskripsi'] = $penyakit->deskripsi;
            $penyakitTerdiagnosis[$key]['solusi'] = $penyakit->solusi;
        }

        // Kirim data ke view
        return view('diagnosa.hasil-diagnosa', compact('penyakitTerdiagnosis'));
    }

    // public function showHasilDiagnosa()
    // {
    //     return view('diagnosa.hasil-diagnosa');
    // }
}