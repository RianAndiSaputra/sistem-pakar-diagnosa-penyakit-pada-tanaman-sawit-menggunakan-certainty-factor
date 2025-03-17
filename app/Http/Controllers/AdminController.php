<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rules;

class AdminController extends Controller
{
    // Menampilkan dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    // CRUD untuk Gejala
    public function gejalaIndex()
    {
        $gejala = Gejala::all();
        return view('admin.gejala.index', compact('gejala'));
    }

    public function gejalaStore(Request $request)
    {
        Gejala::create($request->all());
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil ditambahkan.');
    }

    public function gejalaDelete($id)
    {
        Gejala::findOrFail($id)->delete();
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil dihapus.');
    }

    // CRUD untuk Penyakit
    public function penyakitIndex()
    {
        $penyakits = Penyakit::all();
        return view('admin.penyakit.index', compact('penyakits'));
    }

    public function penyakitStore(Request $request)
    {
        Penyakit::create($request->all());
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil ditambahkan.');
    }

    public function penyakitDelete($id)
    {
        Penyakit::findOrFail($id)->delete();
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil dihapus.');
    }

    // Menampilkan halaman Kelola Rules
    public function rulesIndex()
    {
        $penyakits = Penyakit::all();
        $gejala = Gejala::all(); // Ambil semua data gejala
        $rules = Rules::with('gejala')->get();
        return view('admin.rules.index', compact('rules', 'penyakits', 'gejala'));
    }

    // Menyimpan Rules baru
    public function rulesStore(Request $request)
    {
        // Log data yang diterima
        \Log::info('Data yang diterima untuk penyimpanan:', $request->all());

        // Validate data from the form
        $validated = $request->validate([
            'nama_rule' => 'required|string|max:255',
            'gejala_id' => 'required|exists:gejala,id', // Menggunakan tabel gejala yang benar
            'penyakit_id' => 'required|exists:penyakits,id',
            'nilai_cf' => 'required|numeric',
        ]);

        // Membuat atau menyimpan aturan
        $rule = new Rules();
        $rule->nama_aturan = $validated['nama_rule'];
        $rule->gejala_id = $validated['gejala_id']; // Simpan id_gejala
        $rule->penyakit_id = $validated['penyakit_id'];
        $rule->nilai_cf = $validated['nilai_cf'];  // Ambil nilai_cf dari validated data
        $rule->save();

        return redirect()->route('admin.rules.index')->with('success', 'Rule berhasil ditambahkan.');
    }

    // Menghapus Rules
    public function rulesDelete($id)
    {
        try {
            $rule = Rules::findOrFail($id);
            $rule->delete();
            return redirect()->route('admin.rules.index')->with('success', 'Rule berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
